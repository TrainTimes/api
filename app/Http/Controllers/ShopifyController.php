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
        } else {
            Log::debug($pre . ' >> DATA is NOT valid, Someone is trying to be shady! >>');
        }

        Log::debug($pre . ' >> Shopify App Generate Token >> . eof');
    }
}