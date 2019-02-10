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
        $ch = $this->newCurl();

        // Adjust settings as required
        curl_setopt($ch, CURLOPT_URL, $access_token_url);
        curl_setopt($ch, CURLOPT_POST, count($query));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));

        // Execute CURL
        $result = curl_exec($ch);
        $curlInfo = curl_getinfo($ch);
        curl_close($ch);

        // Store the access token
        $result = json_decode($result, true);
        Log::debug($pre . ' >> Shopify API return code >> ' . $curlInfo['http_code']);

        // make a test call & log the products returned & persist access_token
        if ($curlInfo['http_code'] === 200 ){
            Log::debug($pre . ' >> Shopify Access Token >> . eof' . $result['access_token']);

            $products = $this->shopify_call($result['access_token'], $shop, "/admin/products.json", array(), 'GET');
            $products = $products['response'];

            Log::debug($pre . ' >> Products  for shop >> . eof' . $shop . ' << ' . print_r($products) );

        } else {
            Log::debug($pre . ' >> We were unable to get Shopify Access Token  for shop >> . eof' . $shop);
        }

        return $access_token = $result['access_token'];
    }

    // I have to come back & clean up this one to make use of newCurl()
    private function shopify_call($token, $shop, $api_endpoint, $query = array(), $method = 'GET', $request_headers = array()) {

        // Build URL
        $url = "https://" . $shop . $api_endpoint;
        if (!is_null($query) && in_array($method, array('GET', 	'DELETE'))) $url = $url . "?" . http_build_query($query);
        // Configure cURL
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, TRUE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 3);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 3);
        // curl_setopt($curl, CURLOPT_SSLVERSION, 3);
        curl_setopt($curl, CURLOPT_USERAGENT, 'My New Shopify App v.1');
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        // Setup headers
        $request_headers[] = "";
        if (!is_null($token)) $request_headers[] = "X-Shopify-Access-Token: " . $token;
        curl_setopt($curl, CURLOPT_HTTPHEADER, $request_headers);
        if ($method != 'GET' && in_array($method, array('POST', 'PUT'))) {
            if (is_array($query)) $query = http_build_query($query);
            curl_setopt ($curl, CURLOPT_POSTFIELDS, $query);
        }

        // Send request to Shopify and capture any errors
        $response = curl_exec($curl);
        $error_number = curl_errno($curl);
        $error_message = curl_error($curl);
        // Close cURL to be nice
        curl_close($curl);
        // Return an error is cURL has a problem
        if ($error_number) {
            return $error_message;
        } else {
            // No error, return Shopify's response by parsing out the body and the headers
            $response = preg_split("/\r\n\r\n|\n\n|\r\r/", $response, 2);
            // Convert headers into an array
            $headers = array();
            $header_data = explode("\n",$response[0]);
            $headers['status'] = $header_data[0]; // Does not contain a key, have to explicitly set
            array_shift($header_data); // Remove status, we've already set it above
            foreach($header_data as $part) {
                $h = explode(":", $part);
                $headers[trim($h[0])] = trim($h[1]);
            }
            // Return headers and Shopify's response
            return array('headers' => $headers, 'response' => $response[1]);
        }

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