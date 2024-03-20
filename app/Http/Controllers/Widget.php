<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\OzonApi;
use stdClass;

class Widget extends Controller
{
    
    public function index(OzonApi $api) {
        $list = $api->productList(new stdClass, '', 5);
        
        $products = [];
        foreach($list['items'] as $item) {
            $item = (object) $item;
            $products[] = (object) $api->productInfo($item->product_id, $item->offer_id);
        }

        return view('widget', compact('products'));
    }

}
