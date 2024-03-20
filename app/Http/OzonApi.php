<?php

namespace App\Http;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Carbon\Carbon;
use stdClass;

class OzonApi
{

    protected $response = null;

    public function __construct()
    {

    }

    public function get(string $url, array $query = []): array
    {
        $response = Http::ozonApi()->get($url, $query);
        $this->response = $response;
        
        if ($response->successful()) {
            return $response->json();
        } else {
            $response->throw();
        }
    }

    public function post(string $url, array $query = []): array
    {
        $response = Http::ozonApi()->post($url, $query);
        $this->response = $response;

        if ($response->successful()) {
            return $response->json();
        } else {
            $response->throw();
        }
    }

    public function getResponse(): Response {
        return $this->response;
    }

    public function productList(object $filter = new stdClass, string $lastId = null, int $limit = 1000): array {
        return $this->post('/v2/product/list', [
            'filter' => $filter,
            'last_id' => $lastId,
            'limit' => $limit,
        ])['result'];
    }

    public function productInfo(int $product_id, string $offer_id = null, int $sku = null): array {
        return $this->post('/v2/product/info', [
            'product_id' => $product_id,
            'offer_id' => $offer_id,
            'sku' => $sku,
        ])['result'];
    }



}