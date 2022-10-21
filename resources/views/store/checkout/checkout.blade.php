@extends('layouts.app')

@section('content')
    <div class="">
        <h3 class="block-title alt"><i class="fa fa-angle-down"></i><span> سفارشات</span></h3>
        <div class="row orders">
            <table class="table">
                <thead>
                    <tr>
                        <th>محصول</th>
                        <th>تولیدکننده</th>
                        <th>تعداد</th>
                        <th>مبلغ</th>
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
            <tbody></tbody>
        </div>
    </div>

    <div class="">
        <h3 class="block-title alt"><i class="fa fa-angle-down"></i><span> آدرس ارسال</span></h3>
        <div class="row orders">
            <form action="javascript:void(0)" id="customer-address">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="background: black">استان - شهر</th>
                        </tr>
                        <tr>
                            <td>
                                <select name="city" id="city" class="form-control select2" style="text-align: center" dir="ltr">
                                    @foreach ($cities as $item)
                                        <option value="">{{ $item->province }} - {{ $item->city }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th style="background: black">آدرس کامل</th>
                        </tr>
                        <tr>
                            <td>
                                <textarea name="address" id="address" class="col-sm-12" rows="10"></textarea>
                            </td>
                        </tr>
                        
                        <tr>
                            <th style="background: black">موقعیت مکانی</th>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btn-success">ثبت</button>
                            </td>
                        </tr>
                            
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
        

    <script>
    </script>
    
@endsection