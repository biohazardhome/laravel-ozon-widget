<style>
    .widget-products {
        display: flex;
        justify-content: center;
        gap: 1rem;
    }

    .widget-product {
        width: 150px;
        margin-bottom: 16px;
    }

    .widget-product-image {
        width: 150px;
        height: 150px;
    }
</style>

<div class="ozon-widget">
    <div class="widget-products">
        @foreach($products as $product)
            <div class="widget-product">
                <img class="widget-product-image" src="{{ $product->images[0] }}" alt="" title="" loading="lazy">
                <div class="widget-product-name">
                    <a href="https://www.ozon.ru/product/{{ $product->sku }}" title="">
                        {{ str($product->name)->limit(50) }}
                    </a>
                </div>
            </div>
        @endforeach 
    </div>
</div>
