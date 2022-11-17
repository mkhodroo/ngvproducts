@extends('layouts.app')

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
    </section>
    <!-- /PAGE -->
@endsection
        
