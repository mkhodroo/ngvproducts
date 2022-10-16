
<div class="col-md-3 col-sm-6">
    <div class="thumbnail no-border no-padding">
        <div class="media">
            <a class="media-link" data-gal="prettyPhoto" href="{{ url('public/store/assets/img/preview/shop/product-1-big.jpg') }}">
                <?php $image_url = env('PRODUCTS_IMAGE_URL') . $item->main_image()?->image_url ?>
                <img src='{{ $image_url ?? '' }}' alt=""/>
                <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
            </a>
        </div>
        <div class="caption text-center">
            <h4 class="caption-title"><a href="product-details.html">{{ $product->name ?? '' }}</a></h4>
            <div class="rating">
                <span class="star"></span><!--
                --><span class="star active"></span><!--
                --><span class="star active"></span><!--
                --><span class="star active"></span><!--
                --><span class="star active"></span>
            </div>
            <div class="price"><ins>{{ $product?->price()->price ?? '' }} <span style="color: black">تومان</span></ins> <del>{{ $product->old_price ?? '' }}</del></div>
            <div class="buttons">
                <a class="btn btn-theme btn-theme-transparent btn-wish-list" href="#"><i class="fa fa-heart"></i></a><!--
                --><a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>افزودن به سبد</a><!--
                --><a class="btn btn-theme btn-theme-transparent btn-compare" href="#"><i class="fa fa-exchange"></i></a>
            </div>
        </div>
    </div>
</div>