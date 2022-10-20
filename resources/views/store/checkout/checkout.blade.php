@extends('layouts.app')

@section('content')
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

    <script>
    </script>
    
@endsection