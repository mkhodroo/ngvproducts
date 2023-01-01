@extends('layouts.app')

@section('content')
    <section class="page-section">
        <div class="col-sm-4">
            <img 
            src="{{ env('PRODUCTS_IMAGE_URL') . $product->main_image()?->image_url  }}" 
            alt="{{ $product->name }}"
            width="100%">
        </div>
        
        <div class="col-sm-4">
            <h3>{{ $product->name }}</h3>
            <h5>{{ $product->catagory()?->name }}</h5>
            سازنده: 
            <select name="producer" id="producer" class="col-sm-8 select2">
                @foreach ($product->producers() as $item)
                    <option value="{{ $item->id }}">تولیدکننده: {{ $item->name }} - فروشنده: {{ $item->seller_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-sm-3" id="cart-details" style="background: #e6f7f7; margin: 10px; padding: 10px; text-align: center">
            
        </div>
        
    </section>
@endsection

@section('script')
    <script>
        $('#producer').val({{ $product?->min_price()?->product_producer_id }}).change();
        $('#producer').on('change', function(){
            var producer_id = $('#producer').val();
            cart_details(producer_id);
        })
        cart_details({{ $product?->min_price()?->product_producer_id }})
        function cart_details(producer_id){
            var cart_details = $('#cart-details');
            $.get(`{{ url('products/get-details') }}/${producer_id}`, function(data){
                console.log(data);
                cart_details.html('');
                cart_details.append(`
                <div class="price">
                    قیمت: <ins>${data.price.price}<span style="color: black">تومان</span></ins><hr>
                </div>`);
                data.features.forEach(function(item){
                    cart_details.append(`
                    <div class="features">
                        ${item.key}: ${item.value}
                    </div>
                    `);
                })
                

                cart_details.append(`
                <div class="buttons">
                    <a class="btn btn-theme btn-theme-transparent btn-icon-left" style="background: #4ed1fc; width: 100%" onclick="add_to_cart(${data.id})"><i class="fa fa-shopping-cart"></i>افزودن به سبد</a>
                </div>
                `);
            })
           
        }
    </script>
@endsection