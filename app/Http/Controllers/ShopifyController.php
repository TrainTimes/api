<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShopifyController extends Controller
{
    public function install(Request $request)
    {
        $pre = __METHOD__ . ' : ';
        Log::debug($pre . ' >> Shopify App Installation >> . bof');

        $data = $request->all();
        Log::debug($pre . ' ' . print_r($data, true));

        $api_key = env('SHOPIFY_API_KEY');
        $scopes = "read_orders,read_products,write_products";
        $redirect_uri = "https://www.traintimes.co.za/shopify/generatetoken";
        $shop = $data['shop'];
        $install_url = "https://" . $shop . "/admin/oauth/authorize?client_id=" . $api_key . "&scope=" .
            $scopes . "&redirect_uri=" . urlencode($redirect_uri);

        Log::debug($pre . ' >> Shopify App Installation >> . eof');
        header("Location: " . $install_url);
        die();
    }

    public function generateToken(Request $request)
    {
        $pre = __METHOD__ . ' : ';
        $data = $request->all();
        Log::debug($pre . ' >> Shopify App Generate Token >> . bof');
        Log::debug($pre . ' ' . print_r($data, true));

        // validate data
        // Set variables for our request
        $shared_secret = env('SHOPIFY_API_SECRET');
        $params = $_GET; // Retrieve all request parameters
        $hmac = $data['hmac']; // Retrieve HMAC request parameter
        $params = array_diff_key($params, array('hmac' => '')); // Remove hmac from params
        ksort($data); // Sort params lexographically

        // Compute SHA256 digest
        $computed_hmac = hash_hmac('sha256', http_build_query($params), $shared_secret);

        // Use hmac data to check that the response is from Shopify or not
        if (hash_equals($hmac, $computed_hmac)) {
            Log::debug($pre . ' >> DATA is valid, you can get the access token >>');
            // get access_token
            $this->getAccessToken($data['code'], $data['shop']);
        } else {
            Log::debug($pre . ' >> DATA is NOT valid, Someone is trying to be shady! >>');
        }

        Log::debug($pre . ' >> Shopify App Generate Token >> . eof');
    }

    private function getAccessToken($code, $shop)
    {
        $pre = __METHOD__ . ' : ';
        Log::debug($pre . ' >> Shopify App Get Access Token >> . bof');
        // Set variables for our request
        $query = array(
            "client_id" => env('SHOPIFY_API_KEY'), // Your API key
            "client_secret" => env('SHOPIFY_API_SECRET'), // Your app credentials (secret key)
            "code" => $code // Grab the access key from the URL
        );

        // Generate access token URL
        $access_token_url = "https://" . $shop . "/admin/oauth/access_token";

        // Configure curl client and execute request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $access_token_url);
        curl_setopt($ch, CURLOPT_POST, count($query));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
        $result = curl_exec($ch);
        curl_close($ch);

        // Store the access token
        $result = json_decode($result, true);
        Log::debug($pre . ' >> Shopify App Get Access Token >> . bof');
        Log::debug($pre . ' >> Shopify Access Token >> . eof' . $result['access_token']);
        return $access_token = $result['access_token'];
    }

    /**
     * newCurl
     *
     * This function simplifies the repeated use of cURL by returning a
     * created cURL object with its defaults already set.
     *
     * @author Clive C. Banditi
     */
    protected function newCurl()
    {
        $pre = __METHOD__ . ' : ';
        Log::debug($pre . 'bof');

        // Create default cURL object
        $ch = curl_init();

        $curlOpts = array(
            CURLOPT_USERAGENT => env('SMS_USER_AGENT', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:48.0) Gecko/20100101 Firefox/48.0'),
            // User agent
            CURLOPT_RETURNTRANSFER => true,
            // Return response as output
            CURLOPT_FOLLOWLOCATION => true,
            // Follow re-directs (302's)
            CURLOPT_VERBOSE => false,
            // Print out communication information between web server and client
            CURLOPT_CONNECTTIMEOUT => env('SMS_CONNECTION_TIMEOUT', 10),
            // Timeout in waiting for a connection
        );

        curl_setopt_array($ch, $curlOpts);
        Log::debug($pre . 'eof');
        return ($ch);
    }
}