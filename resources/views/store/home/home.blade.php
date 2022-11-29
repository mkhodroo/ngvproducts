@extends('layouts.app')

@section('keywords')
    فروشگاه قطعات گازسوز, قطعات گازسوز, فروشگاه cng, قطعات cng,
@endsection

@section('description')
    فروشگاه ngvkala، اولین و تنها فروشگاه قطعات گازسوز ایران در جهت ارائه محصولات استاندارد و تضمین پایین ترین قیمت به مشتریان خودروهای دوگانه سوز است.
@endsection

@section('content')
    <!-- PAGE -->
    <section class="page-section no-padding slider">
        <div class="container full-width">
        </div>
    </section>
    <!-- /PAGE -->

    <!-- PAGE -->
    <style>
        .thumbnail div.media{
            height: 200px;
        }
        @media only screen and (max-width: 600px) {
            .thumbnail div.media{
                height: 100px;
            }
            .thumbnail div div.buttons{
                width: 100%
            }
        }
    </style>

    <section class="page-section">
        <div class="container">

            <div class="tabs">
                <ul id="tabs" class="nav nav-justified-off"><!--
                    --><li class=""><a href="#tab-1" data-toggle="tab">جدیدترین ها</a></li>
                </ul>
            </div>

            <div class="tab-content">

                <!-- tab 1 -->
                
            </div>
            <div class="container-fluid h-scroll" id="tab-1">
                <div class="row h-scroll" id="newest-products">
                    @foreach ($newest_products as $item)
                        @include('store.products.single',[
                            'product' => $item
                        ])
                    @endforeach
                </div>
            </div>

        </div>
        <div class="container">
            <div class="tabs">
                <ul id="tabs" class="nav nav-justified-off"><!--
                    --><li class=""><a href="#tab-1" data-toggle="tab" style="font-weight: bold"> دسته بندی ها</a></li>
                </ul>
            </div>
            <div class="container-fluid h-scroll" id="tab-1">
                <div class="row" id="">
                    <a href="{{ route('show-catagory-by-part-of-name', ['name' => 'مخزن']) }}">
                        <div class="col-sm-2 col-xs-3 img-circle" style="text-align: center">
                            <img class="" src="{{ url('public/store/assets/img/capsole.png') }}" alt="capsole" style="width: 100%">
                            <h4 style="font-weight: bold">مخازن CNG</h4>
                        </div>
                    </a>
                    <a href="{{ route('show-catagory-by-part-of-name', ['name' => 'رگلاتور']) }}">
                        <div class="col-sm-2 col-xs-3 img-circle" style="text-align: center">
                            <img class="" src="{{ url('public/store/assets/img/cng-regolator.png') }}" alt="capsole" style="width: 100%">
                            <h4 style="font-weight: bold">رگولاتورهای CNG</h4>
                        </div>
                    </a>
                    <a href="{{ route('show-catagory-by-part-of-name', ['name' => 'شیرمخزن']) }}">
                        <div class="col-sm-2 col-xs-3 img-circle" style="text-align: center">
                            <img class="" src="{{ url('public/store/assets/img/cng-valve.png') }}" alt="capsole" style="width: 100%">
                            <h4 style="font-weight: bold">شیرمخزن CNG</h4>
                        </div>
                    </a>
                    <a href="{{ route('show-catagory-by-part-of-name', ['name' => 'شیرقطع کن']) }}">
                        <div class="col-sm-2 col-xs-3 img-circle" style="text-align: center">
                            <img class="" src="{{ url('public/store/assets/img/cng-cutoff-valve.png') }}" alt="capsole" style="width: 100%">
                            <h4 style="font-weight: bold">شیرقطع کن های CNG</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="tabs">
                <ul id="tabs" class="nav nav-justified-off"><!--
                    --><li class=""><a href="#tab-1" data-toggle="tab" style="font-weight: bold">برندهای فعال </a></li>
                </ul>
            </div>
            <div class="container-fluid h-scroll" id="tab-1">
                <div class="row" id="" >
                    <div class="col-sm-2 col-xs-3 img-circle" style="text-align: center">
                        <img class="" src="{{ url('public/store/assets/img/bsi.png') }}" alt="capsole" style="width: 100%">
                        <h4 style="font-weight: bold">بهینه صنعت اصفهان</h4>
                    </div>
                    <div class="col-sm-2 col-xs-3 img-circle" style="text-align: center">
                        <img class="" src="{{ url('public/store/assets/img/asianama.png') }}" alt="capsole" style="width: 100%">
                        <h4 style="font-weight: bold">آسیاناما</h4>
                    </div>
                    <div class="col-sm-2 col-xs-3 img-circle" style="text-align: center">
                        <img class="" src="{{ url('public/store/assets/img/shahab.png') }}" alt="capsole" style="width: 100%">
                        <h4 style="font-weight: bold">شهاب گازسوز</h4>
                    </div>
                    <div class="col-sm-2 col-xs-3 img-circle" style="text-align: center">
                        <img class="" src="{{ url('public/store/assets/img/electrofan.png') }}" alt="capsole" style="width: 100%">
                        <h4 style="font-weight: bold">الکتروفن</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /PAGE -->
@endsection
        
