@extends('layouts.app')

@section('content')
<section class="page-section">
    <div class="">
        <div class="col-sm-6 box">
        <h3 class="block-title alt"><i class="fa fa-angle-down"></i><span> سفارشات</span></h3>
            <div class="col-sm-12">
                <table class="table" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="text-align: center">محصول</th>
                            <th style="text-align: center">تولیدکننده</th>
                            <th style="text-align: center">تعداد</th>
                            <th style="text-align: center">مبلغ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->producer->name}}</td>
                                <td>{{$item->number}}</td>
                                <td>{{$item->price->price* $item->number}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

    <div class="col-sm-3">
        <h3 class="block-title alt"><i class="fa fa-angle-down"></i><span> آدرس ارسال</span></h3>
        @csrf
        <div class="col-sm-12">
            <div class="col-md-6">
                @foreach ($customer_addresses as $item)
                    <input type="radio" name="address" value="{{ $item->id }}">
                    {{$item->city()->province}} -
                    {{$item->city()->city}} - 
                    {{ $item->address }}
                @endforeach
            </div>
            <div class="col-md-6">
                <button class="btn btn-info" onclick="open_add_address_modal()">افزودن آدرس</button>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <h3 class="block-title alt"><i class="fa fa-angle-down"></i><span>نحوه ارسال</span></h3>
        <div class="col-sm-12">
            <input type="radio" name="how_to_send" id="" value="send"> ارسال توسط ما
        </div>
        <div class="col-sm-12">
            <input type="radio" name="how_to_send" id="" value="delivery_by_customer"> تحویل حضوری توسط شما
        </div>
    </div>
    
    <div class="col-sm-12">
        <h3 class="block-title alt"><i class="fa fa-angle-down"></i><span>نحوه پرداخت</span></h3>
        <div class="col-sm-12">
            <input type="radio" name="payment_status" id="online" value="online">پرداخت آنلاین
        </div>
        <div class="col-sm-12">
            <input type="radio" name="payment_status" id="offline" value="offline">پرداخت حضوری
        </div>
        <div class="col-sm-12">
            <button class="btn btn-success" onclick="pay()">پرداخت</button>
        </div>
    </div>
</section>
    
        

    <script>
        function pay(){
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
                }
            })
        }
    </script>
    
@endsection