<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;

class ShopifyController extends Controller
{
    public function install(Request $request)
    {
//      $shopifyClient = new ShopifyClient();
//        Log::debug('>> Shopify App Installation >>');
        $data = $request->all();

        $api_key = env('SHOPIFY_API_KEY');
        $api_secret = env('SHOPIFY_API_SECRET');
        $scopes = "read_orders,read_products,write_products";
        $redirect_uri = "https://www.traintimes.co.za/shopify/generatetoken";
        $shop = $data['shop'];
        $install_url = "https://www." . $shop . "/admin/oauth/authorize?client_id=" . $api_key . "&scope=" .
            $scopes . "&redirect_uri=" . urlencode($redirect_uri);

        header("Location: " . $install_url);
        die();
    }

    public function generateToken(Request $request)
    {

        $data = $request->all();

        return $data;
//        // Set variables for our request
//        $shared_secret = "TBB5wltKarRtKn5mUVZck9RxHePNN6Jo";
//        $params = $_GET; // Retrieve all request parameters
//        $hmac = $_GET['hmac']; // Retrieve HMAC request parameter
//        $params = array_diff_key($params, array('hmac' => '')); // Remove hmac from params
//        ksort($params); // Sort params lexographically
//
//        // Compute SHA256 digest
//        $computed_hmac = hash_hmac('sha256', http_build_query($params), $shared_secret);
//
//        // Use hmac data to check that the response is from Shopify or not
//        if (hash_equals($hmac, $computed_hmac)) {
//            // VALIDATED
//        } else {
//            // NOT VALIDATED – Someone is trying to be shady!
//        }
    }

}
