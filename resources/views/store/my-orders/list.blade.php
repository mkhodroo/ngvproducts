@extends('layouts.app')

@section('content')
    <section class="page-section">
        
            @foreach ($order_codes as $item)
            <div class="col-sm-12 box">
                <fieldset style="background: #78b374; margin: 10px">
                    <legend style="background: black; color: white"> سفارش شماره {{ $item->order_code }}</legend>
                    <div class="col-sm-6">
                        <table class="table" style="text-align: center; color: black">
                            <thead>
                                <tr>
                                    <th style="text-align: center">محصول</th>
                                    <th style="text-align: center">تولیدکننده</th>
                                    <th style="text-align: center">تعداد</th>
                                    <th style="text-align: center">مبلغ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders->where('order_code', $item->order_code) as $o)
                                    <tr>
                                        <td>{{$o->producer()->product()->name}}</td>
                                        <td>{{$o->producer()->name}}</td>
                                        <td>{{$o->number}}</td>
                                        <td>{{$o->price * $o->number}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
            @endforeach
    </section>
@endsection