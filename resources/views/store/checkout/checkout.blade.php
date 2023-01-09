@extends('layouts.app')

@section('content')
<section class="page-section">
    @if (count($items) === 0)
        <div class="col-sm-12" style="text-align: center; color: red">
            سبد خرید شما خالی است
        </div>
    @else
        <div class="col-sm-1"></div>
        <div class="col-sm-6">
                <fieldset style="background: lightblue; margin: 10px; padding: 5px">
                    <legend style="background: rgb(0, 177, 106)">سفارشات</legend>
                    <div class="col-sm-12">
                        <table class="table" style="text-align: center">
                            <thead>
                                <tr>
                                    <th style="text-align: center">محصول</th>
                                    <th style="text-align: center">تولیدکننده</th>
                                    <th style="text-align: center">تعداد</th>
                                    <th style="text-align: center">مبلغ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->producer->name}}</td>
                                        <td>{{$item->number}}</td>
                                        <td class="camma-value">{{ (int) $item->price->showing_price* $item->number}}</td>
                                        <td><i class="fa fa-trash" style="color: red; cursor: pointer" onclick="delete_item_from_cart({{$item->id}})"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                                <tr style="background: lightgray; color: black">
                                    <td>مجموع</td>
                                    <td></td>
                                    <td></td>
                                    <td class="camma-value">{{ $total_price }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </fieldset>                
        </div>

        <div class="col-sm-3">
            <fieldset style="background: lightblue; margin: 10px; padding: 5px">
                <legend style="background: rgb(0, 177, 106)"> آدرس ارسال</legend>
                @csrf
                @foreach ($customer_addresses as $item)
                    <div class="col-sm-12">
                        <input type="radio" name="address" value="{{ $item->id }}">
                        {{$item->city()->province}} -
                        {{$item->city()->city}} - 
                        {{ $item->address }}
                    </div>
                @endforeach
                <button class="btn btn-info" onclick="open_add_address_modal()">افزودن آدرس</button>
                @include('store.addresses.add-address-modal', [ 'cities' => $cities ])
            </fieldset>       
            <fieldset style="background: lightblue; margin: 10px; padding: 5px">
                <legend style="background: rgb(0, 177, 106)">نحوه ارسال</legend>
                <div class="col-sm-12">
                    <input type="radio" name="how_to_send" id="" value="send"> ارسال توسط ما (شامل هزینه ارسال)
                </div>
                <div class="col-sm-12">
                    <input type="radio" name="how_to_send" id="" value="delivery_by_customer"> تحویل حضوری توسط شما
                </div>
            </fieldset>
            
            <fieldset style="background: lightblue; margin: 10px; padding: 5px">
                <legend style="background: rgb(0, 177, 106)">نحوه پرداخت</legend>
                <div class="col-sm-12">
                    <input type="radio" name="payment_status" id="online" value="online" disabled>پرداخت آنلاین
                </div>
                <div class="col-sm-12">
                    <input type="radio" name="payment_status" id="offline" value="offline">پرداخت حضوری
                </div>
                <div class="col-sm-12">
                    <button class="btn btn-danger" onclick="pay()">تایید سفارش</button>
                </div>
            </fieldset>     
        </div>
        
        @endif
</section>
    
        

    <script>
        function pay(){
            show_loading();
            var fd = new FormData();
            fd.append('address',$('input[name="address"]:checked').val());
            fd.append('how_to_send',$('input[name="how_to_send"]:checked').val());
            fd.append('payment_status',$('input[name="payment_status"]:checked').val());
            console.log(fd);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                method: 'post',
                url: `{{ route('pay') }}`,
                data: fd,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    alert_notification(data);
                    window.location = '{{ route("my-orders") }}';
                    hide_loading();
                }
            })
        }

        function delete_item_from_cart(cart_id){
            show_loading();
            var fd = new FormData();
            fd.append('id', cart_id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                method: 'post',
                url: `{{ route('delete-cart-item')}}`,
                data: fd,
                processData: false,
                contentType: false,
                success: function(data){
                    console.log(data);
                    alert_notification('کالای موردنظر از سبد خرید حذف شد.')
                    location.reload();
                }
            })
        }
    </script>
    
@endsection