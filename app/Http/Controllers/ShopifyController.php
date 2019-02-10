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
        $install_url = "https://www." . $shop . "/admin/oauth/authorize?client_id=" . $api_key . "&scope=" .
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
        Log::debug($pre . ' >> Shopify App Generate Token >> . eof');
    }

}
