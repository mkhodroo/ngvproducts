<!DOCTYPE html>
<html lang="en" dir="rtl"><!-- sherad by mellatweb.com -->
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ngvproducts</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('public/store/assets/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="shortcut icon" href="{{ url('public/store/assets/ico/favicon.ico') }}">

    <!-- CSS Global -->
    <link href="{{ url('public/store/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/store/assets/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/store/assets/plugins/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/store/assets/plugins/prettyphoto/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ url('public/store/assets/plugins/owl-carousel2/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/store/assets/plugins/owl-carousel2/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/store/assets/plugins/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/dashboard/assets/node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/dashboard/assets/css/bootstrap-theme.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/store/assets/css/rtl.css') }}" rel="stylesheet" type="text/css" />


    <!-- Theme CSS -->
    <link href="{{ url('public/store/assets/css/theme.css') }}" rel="stylesheet">

    <!-- Head Libs -->
    <script src="{{ url('public/store/assets/plugins/modernizr.custom.js') }}"></script>

    <script src="{{ url('public/store/assets/plugins/jquery/jquery-1.11.1.min.js') }}"></script>


    

</head>
<body id="home" class="wide">
<!-- PRELOADER -->
<div id="preloader">
    <div id="preloader-status">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
        <div id="preloader-title">Loading</div>
    </div>
</div>
<!-- /PRELOADER -->

<!-- WRAPPER -->
<div class="wrapper">

    <!-- Popup: Shopping cart items -->
    @include('layouts.cart-item')
    <!-- /Popup: Shopping cart items -->

    <!-- Header top bar -->
    @include('store.auth.login')
    @include('store.auth.register')
    @include('layouts.alert')
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-right">
                <ul class="list-inline" id="login-info">
                    <script>
                        $.get(`{{ route('get-user-info') }}`, function(data){
                            if(data){
                                $('#login-info').append(`<li class="icon-user" ><a href="{{ route('my-orders') }}"> <img src="{{ url('public/store/assets/img/icon-1.png') }}" alt=""/><span>${data.name}</span></a></li>`)
                                $('#login-info').append(`<li class="icon-form" onclick="logout()" style="cursor: pointer"><img src="{{ url('public/store/assets/img/icon-2.png') }}" alt=""/> <span class="colored">خروج</span></span></li>`);
                            }else{
                                $('#login-info').append(`<li class="icon-user" onclick="open_login_modal()" style="cursor: pointer"><img src="{{ url('public/store/assets/img/icon-1.png') }}" alt=""/> <span>ورود</span></li>`);
                                $('#login-info').append(`<li class="icon-form" onclick="open_register_modal()" style="cursor: pointer"><img src="{{ url('public/store/assets/img/icon-2.png') }}" alt=""/> <span class="colored">ثبت نام</span></span></li>`);
                            }
                        })
                    </script>
                </ul>
            </div>
            <div class="top-bar-left">
                <ul class="list-inline">
                    <li class="hidden-xs"><a href="about.html">درباره ما</a></li>
                    <li class="hidden-xs"><a href="blog.html">بلاگ</a></li>
                    <li class="hidden-xs"><a href="contact.html">تماس با ما</a></li>
                    <li class="hidden-xs"><a href="faq.html">سوالات پر تکرار</a></li>
                    <li class="hidden-xs"><a href="wishlist.html">علاقه مندی ها</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Header top bar -->

    <!-- HEADER -->
    <header class="header">
        <div class="header-wrapper">
            <div class="container">

                <!-- Logo -->
                <div class="logo" style="text-align: center">
                    <h3 style="font-weight: bold">
                        <a href="{{ route('home') }}">
                            <img src="{{ url('public/store/assets/img/logo.png') }}" alt="">
                            NGV<span style="color: black">Products</span>
                        </a>
                    </h3>
                </div>
                <!-- /Logo -->

                <!-- Header search -->
                <div class="header-search">
                    <input class="form-control" type="text" name="search" id="search-field" list="search" autocomplete="off" placeholder="جستجو ..."/>
                    @csrf
                    <button><i class="fa fa-search"></i></button>
                    <datalist id="search">
                        <option value="asd">asd</option>
                        <option value="asd">asd</option>
                        <option value="asd">asd</option>
                    </datalist>
                </div>
                <script>
                    $('#search-field').on('keyup', function(){
                        var fd = new FormData();
                        fd.append('q', $('#search-field').val());
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('input[name="_token"]').val()
                            },
                            method: 'post',
                            url: `{{ route('search')}}`,
                            data: fd,
                            processData: false,
                            contentType: false,
                            success: function(data){
                                console.log(data);
                                var datalist = $('#search');
                                datalist.html('');
                                data.forEach(function (item) { 
                                    console.log(item);
                                    datalist.append(`<option value="${item.name}"></option>`)
                                })
                            }
                        })
                    })
                </script>
                <!-- /Header search -->

                <!-- Header shopping cart -->
                <div class="header-cart">
                    <div class="cart-wrapper">
                        <a href="#" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-cart"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">  </span> <i class="fa fa-angle-down"></i></a>
                        <!-- Mobile menu toggle button -->
                        <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>
                        <!-- /Mobile menu toggle button -->
                    </div>
                </div>
                <!-- Header shopping cart -->

            </div>
        </div>
        <div class="navigation-wrapper">
            <div class="container">
                <!-- Navigation -->
                <nav class="navigation closed clearfix" >
                    <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                    <ul class="nav sf-menu" >
                        <li class="active">
                            <a href="{{ route('home') }}">NGVProducts</a>
                        </li>
                        <li class="megamenu"><a href="#">محصولات</a>
                            <ul>
                                <li class="row" >
                                    <div class="col-md-2">
                                        <h4 class="block-title"><span>مخازن</span></h4>
                                        <ul>
                                            <li><a href="{{ route('show-catagory-by-name', ['name' => 'مخزن نوع اول']) }}">نوع اول</a></li>
                                            <li><a href="{{ route('show-catagory-by-name', ['name' => 'مخزن نوع دوم']) }}">نوع دوم</a></li>
                                            <li><a href="{{ route('show-catagory-by-name', ['name' => 'مخزن-نوع-سوم']) }}">نوع سوم</a></li>
                                            <li><a href="{{ route('show-catagory-by-name', ['name' => 'مخزن نوع سوم']) }}">نوع چهارم</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h4 class="block-title"><span>رگلاتور</span></h4>
                                        <ul>
                                            <li><a href="{{ route('show-catagory-by-name', ['name' => 'رگلاتور نسل یک']) }}">نسل یک</a></li>
                                            <li><a href="{{ route('show-catagory-by-name', ['name' => 'رگلاتور نسل دو']) }}">نسل دو</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h4 class="block-title"><span>شیرمخزن</span></h4>
                                        <ul>
                                            <li><a href="{{ route('show-catagory-by-name', ['name' => 'شیرمخزن مخروطی']) }}">مخروطی</a></li>
                                            <li><a href="{{ route('show-catagory-by-name', ['name' => 'شیرمخزن استوانه']) }}">استوانه</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h4 class="block-title"><span>شیرقطع کن</span></h4>
                                        <ul>
                                            <li><a href="{{ route('show-catagory-by-name', ['name' => 'شیرقطع کن دستی']) }}">دستی</a></li>
                                            <li><a href="{{ route('show-catagory-by-name', ['name' => 'شیرقظع کن برقی']) }}">برقی</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-list">
                                            <div class="media">
                                                <a class="pull-left media-link" href="#">
                                                    <img class="media-object" src="{{ url('public/store/assets/img/preview/shop/top-sellers-2.jpg') }}" alt="">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="#">Standard Product Header</a></h4>
                                                    <div class="rating">
                                                        <span class="star"></span><!--
                                                        --><span class="star active"></span><!--
                                                        --><span class="star active"></span><!--
                                                        --><span class="star active"></span><!--
                                                        --><span class="star active"></span>
                                                    </div>
                                                    <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <a class="pull-left media-link" href="#">
                                                    <img class="media-object" src="{{ url('public/store/assets/img/preview/shop/top-sellers-3.jpg') }}" alt="">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="#">Standard Product Header</a></h4>
                                                    <div class="rating">
                                                        <span class="star"></span><!--
                                                        --><span class="star active"></span><!--
                                                        --><span class="star active"></span><!--
                                                        --><span class="star active"></span><!--
                                                        --><span class="star active"></span>
                                                    </div>
                                                    <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="sale"><a href="{{ route('home') }}">فروشگاه</a></li>
                    </ul>
                </nav>
                <!-- /Navigation -->
            </div>
        </div>
    </header>
    <!-- /HEADER -->

    <!-- CONTENT AREA -->
    <div class="content-area">

        @yield('content')

    </div>
    <!-- /CONTENT AREA -->

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">

                    <div class="col-md-3">
                        <div class="widget">
                            <h4 class="widget-title">درباره ما</h4>
                            <p></p>
                            <ul class="social-icons">
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="widget">
                            <h4 class="widget-title">وبلاگ</h4>
                            <p>در وبلاگ ما میتوانید از آخرین خبرهای حوزه سوخت های جایگزین با خبر شوید.</p>
                            <form action="#">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Enter Your Mail and Get $10 Cash"/>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-theme btn-theme-transparent">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="widget widget-categories">
                            <h4 class="widget-title">اطلاعات</h4>
                            <ul>
                                <li><a href="#">درباره ما</a></li>
                                <li><a href="#">اطلاعات ارسال کالاها</a></li>
                                <li><a href="#">تماس با ما</a></li>
                                <li><a href="#">قوانین و شرایط</a></li>
                                <li><a href="#">خط مشی</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="widget widget-tag-cloud">
                            <h4 class="widget-title">دسته بندی ها</h4>
                            <ul>
                                <li><a href="#">مخازن</a></li>
                                <li><a href="#">رگلاتور</a></li>
                                <li><a href="#">شیر مخزن ها</a></li>
                                <li><a href="#">شیر قطع کن ها</a></li>
                                <li><a href="#">جدیدترین ها</a></li>
                                <li><a href="#">پرفروش ترین ها</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-meta">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="copyright">تمامی حقوق این سایت متعلق به <a href="https://www.ngvkala.ir/"> ngvkala.ir<a/> می باشد</div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- /FOOTER -->

    <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>

</div>
<!-- /WRAPPER -->

<!-- JS Global -->
<script src="{{ url('public/store/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/superfish/js/superfish.min.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/prettyphoto/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/owl-carousel2/owl.carousel.min.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/jquery.sticky.min.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/jquery.easing.min.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/jquery.smoothscroll.min.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ url('public/dashboard/assets/node_modules/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>

<!-- JS Page Level -->
<script src="{{ url('public/store/assets/js/theme.js') }}"></script>

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{ url('public/store/assets/plugins/jquery.cookie.js') }}"></script>
<!--<![endif]-->

<!-- Custome JS -->

<script>
    $(".select2").select2();
    
    function alert_notification(msg='انجام شد'){
        $('#alert-success').html(msg);
        $('#alert-success').show();
        $('#alert-success').delay(2000).fadeOut('slow');;
    }

    function error_notification(msg='خطا دریافت شد'){
        $('#alert-error').html(msg);
        $('#alert-error').show();
        $('#alert-error').delay(3000).fadeOut('slow');;
    }

    function add_to_cart(product_producer_id){
        fd = { 'pp_id': product_producer_id };
        $.ajax({
            url: `{{ route('add-to-cart') }}`,
            data: fd,
            proccessData : false,
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            method: 'get',
            success: function(data){
                console.log(data);
                alert_notification("محصول به سبد خرید اضافه شد");
                update_user_cart_item();
                update_total_cart_price();
            },
            error: function (data) {
                console.log(data);
                error_notification(data.responseText);
            }
        })
    }
</script>

@yield('script')


</body>
</html>