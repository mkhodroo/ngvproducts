@extends('layouts.app')

@section('content')
    <!-- PAGE -->
    <section class="page-section no-padding slider">
        <div class="container full-width">
        </div>
    </section>
    <!-- /PAGE -->

    <!-- PAGE -->
    <section class="page-section">
        <div class="container">

            <div class="tabs">
                <ul id="tabs" class="nav nav-justified-off"><!--
                    --><li class=""><a href="#tab-1" data-toggle="tab">جدیدترین ها</a></li>
                </ul>
            </div>

            <div class="tab-content">

                <!-- tab 1 -->
                <div class="tab-pane active" id="tab-1">
                    <div class="row" id="newest-products">
                        @foreach ($newest_products as $item)
                            @include('store.products.single',[
                                'product' => $item
                            ])
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /PAGE -->
@endsection
        
