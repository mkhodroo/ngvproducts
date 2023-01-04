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
        <div class="swiper newest-products">
            
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
              <!-- Slides -->
              <div class="text-center swiper-slide" >
                <h2 class="width-200 white-color yekan-titr">جدیدترین ها</h2>
              </div>
                @foreach ($newest_products as $item)
                    <div class="swiper-slide">
                        @include('store.products.single',[
                            'product' => $item
                        ])
                    </div>
                @endforeach 
              ...
            </div>
          
            <!-- If we need scrollbar -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-scrollbar"></div>
        </div>

        <div class="row catagories table-responsive hide-scroll border-radius" id="catagories">
            <table class="catagories-table" >
                {{-- <div class="text-center scroll-btn" style="float: left; position: relative; top:47%; z-index: 200; height:0px">
                    <button class="btn btn-default" onclick="scroll_left('catagories')" style="position: relative; top: 50%; border-radius: 50%" >></button>
                </div> --}}
                <tr>
                    <td style="text-align: center">
                        <h2 style="width: 200px; color: white" class=" yekan-titr">دسته بندی ها</h2>
                    </td>
                    <td class="text-center width-200">
                        <a href="{{ route('show-catagory-by-part-of-name', ['name' => 'ایسیو های نسل دو']) }}">
                            <img class="width-200" src="{{ url('public/store/assets/img/capsole.png') }}" alt="capsole" style="width: 100%">
                            <h4 style="font-weight: bold" class="white-color">ایسیوهای نسل دو</h4>
                        </a>
                    </td>
                    <td class="text-center width-200">
                        <a href="{{ route('show-catagory-by-part-of-name', ['name' => 'مخزن']) }}">
                            <img class="width-200" src="{{ url('public/store/assets/img/capsole.png') }}" alt="capsole" style="width: 100%">
                            <h4 style="font-weight: bold" class="white-color">مخازن CNG</h4>
                        </a>
                    </td>
                    <td class="text-center width-200">
                        <a href="{{ route('show-catagory-by-part-of-name', ['name' => 'رگلاتور']) }}">
                            <img class="width-200" src="{{ url('public/store/assets/img/cng-regolator.png') }}" alt="capsole" style="width: 100%">
                            <h4 style="font-weight: bold" class="white-color">رگولاتورهای CNG</h4>
                        </a>
                    </td>
                    <td class="text-center width-200">
                        <a href="{{ route('show-catagory-by-part-of-name', ['name' => 'شیرمخزن']) }}">
                            <img class="width-200" src="{{ url('public/store/assets/img/cng-valve.png') }}" alt="capsole" style="width: 100%">
                            <h4 style="font-weight: bold" class="white-color">شیرمخزن CNG</h4>
                        </a>
                    </td>
                    <td class="text-center width-200">
                        <a href="{{ route('show-catagory-by-part-of-name', ['name' => 'شیرقطع کن']) }}">
                            <img class="width-200" src="{{ url('public/store/assets/img/cng-cutoff-valve.png') }}" alt="capsole">
                            <h4 style="font-weight: bold" class="white-color">شیرقطع کن های CNG</h4>
                        </a>
                    </td>
                </tr>
            </table>
            
        </div>

        
          <script>
        
            var w = window.innerWidth;
            var spv = 3
            if(w <= 600){
                spv = 1.5;
            }
            if( w >= 600 && w <= 999){
                spv = 2
            }
            if( w >= 999){
                spv = 5
            }
            console.log(spv);
            var swiper = new Swiper(".swiper", {
                slidesPerView: spv,
                spaceBetween: 40,
                pagination: {
                el: ".swiper-pagination",
                clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
          </script>
    </section>
    <!-- /PAGE -->
@endsection
        
