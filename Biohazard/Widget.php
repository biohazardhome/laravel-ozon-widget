<?php

namespace Biohazard;

use App\Http\OzonApi;
use stdClass;

class Widget {

	const
		LIMIT = 5,
		PRODUCTS = ['403482751', '403636472', '403505713', '403510966', '403617123'], // product ids
		CACHE_TIME = 500,
		VISIBLE = 'VISIBLE'; // ALL, VISIBLE, TO_SUPPLY, IN_SALE, OVERPRICED

	public
		$api = null,
		$products = [];

	public function __construct() {
		$this->api = app(OzonApi::class);		
	}

	public function init() {

		$products = cache()->remember('ozon-widget-products', static::CACHE_TIME, function () {
            return $this->apiProducts();
        });

		return view('widget', compact('products'));
	}

	public function apiProducts() {
		$filter = new stdClass;
		$filter->product_id = static::PRODUCTS;
		$filter->visibility = static::VISIBLE;
		$list = $this->api->productList($filter, static::LIMIT);
        
        $products = [];
        foreach($list['items'] as $item) {
            $item = (object) $item;
            $product = (object) $this->api->productInfo($item->product_id, $item->offer_id);

            $this->productPrepare($product);

            $products[] = $product;
        }
        $this->products = $products;

        return $products;
	}

	public function getProducts():array {
		return $this->products;
	}

	public function productPrepare(object $product):object {
        $product->url = 'https://www.ozon.ru/product/'. $product->sku;
        $product->marketing_price = $this->productPrice($product->marketing_price);
        $product->old_price = $this->productPrice($product->old_price);

        return $product;
    }

    public function productPrice(string $price):string {
        return number_format((float) $price, 0, null, ' ');
    }

}