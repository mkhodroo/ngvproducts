
<div class="col-md-12 col-sm-12 sigle-product">
    <div class="sigle-product-content" style="background: #f2fcfc ; border-radius: 8px">
        <div class="thumbnail no-border no-padding">
            <div class="media" style="padding: 5px">
                <a class="media-link" data-gal="prettyPhoto" href="{{ url('public/store/assets/img/preview/shop/product-1-big.jpg') }}">
                    <?php $image_url = env('PRODUCTS_IMAGE_URL') . $product->main_image()?->image_url ?>
                    <img src='{{ $image_url ?? '' }}' alt=""/>
                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                </a>
            </div>
            <div class="caption text-center">
                <h4 class="caption-title"><a href="{{ route('product-show', [ 'id' => $product->id ]) }}">{{ $product->name ?? '' }}</a></h4>
                <div class="rating">
                    <span class="star"></span><!--
                    --><span class="star active"></span><!--
                    --><span class="star active"></span><!--
                    --><span class="star active"></span><!--
                    --><span class="star active"></span>
                </div>
                <div class="price"><ins>{{ $product?->min_price()->price ?? '' }} <span style="color: black">تومان</span></ins> <del>{{ $product->old_price ?? '' }}</del></div>
                <div class="buttons">
                    <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                    --><a class="btn btn-theme btn-theme-transparent btn-icon-left" onclick="add_to_cart({{$product->min_price()?->product_producer_id}})"><i class="fa fa-shopping-cart"></i>افزودن به سبد</a><!--
                    --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
                </div>
            </div>
        </div>
    </div>
    
</div>