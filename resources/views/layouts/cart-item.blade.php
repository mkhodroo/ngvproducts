<div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="container">
            <div class="cart-items">
                <div class="cart-items-inner">
                    <div id="user-cart-items">
                        
                    </div>
                    <div class="">
                        <p class="pull-right item-price" id="total-cart-price"></p>
                        <div class="media-body">
                            <h4 class="media-heading item-title summary">مجموع</h4>
                        </div>
                    </div>
                    <div class="">
                        <div class="media-body">
                            <div>
                                <a href="#" class="btn btn-theme btn-theme-dark" data-dismiss="modal">بستن</a><!--
                                --><a href="{{ route('checkout') }}" class="btn btn-theme btn-theme-transparent btn-call-checkout">پرداخت</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function update_user_cart_item(){
        empty_user_cart_items();
        $.get(`{{ route('get-user-cart-items') }}`, function(data){
            // console.log(data);
            data.forEach(function(item){
                $('#user-cart-items').append(`<div class="">`);
                $('#user-cart-items').append(`<a class="pull-left" href="#"><img class="media-object item-image" src="" alt=""></a>`)
                $('#user-cart-items').append(`<p class="pull-right item-price">${item.price.showing_price} × ${item.number}</p>`)
                $('#user-cart-items').append(`
                <div class="media-body">
                    <h4 class="media-heading item-title"><a href="#">${item.product.name}</a></h4>
                    <p class="item-desc">${item.producer.name}</p>
                </div><hr>
                `)
                $('#user-cart-items').append(`</div>`);
            })
            
        });
    }
    update_user_cart_item()

    function update_total_cart_price(){
        $.get(`{{ route('get-total-price') }}`, function(data){
            console.log(data);
            $('#total-cart-price').html(data);
        });
    }
    update_total_cart_price()

    function empty_user_cart_items(){
        $('#user-cart-items').html('');
    }
</script>