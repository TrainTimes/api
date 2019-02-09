<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;

class ShopifyController extends Controller
{
    public function install(Request $request)
    {
//      $shopifyClient = new ShopifyClient();
        Log::debug('>> Shopify App Installation >>');

        $data = $request->all();
        return $data;
    }
}
