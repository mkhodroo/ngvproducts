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

    <!-- Theme CSS -->
    <link href="{{ url('public/store/assets/css/theme.css') }}" rel="stylesheet">
    <link href="{{ url('public/store/assets/css/theme-green-1.css') }}" rel="stylesheet" id="theme-config-link">

    <!-- Head Libs -->
    <script src="assets/plugins/modernizr.custom.js"></script>

    <!--[if lt IE 9]>
    <script src="assets/plugins/iesupport/html5shiv.js"></script>
    <script src="assets/plugins/iesupport/respond.min.js"></script>
    <![endif]-->
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
    <div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="container">
                <div class="cart-items">
                    <div class="cart-items-inner">
                        <div class="media">
                            <a class="pull-left" href="#"><img class="media-object item-image" src="{{ url('public/store/assets/img/preview/shop/order-1s.jpg') }}" alt=""></a>
                            <p class="pull-right item-price">$450.00</p>
                            <div class="media-body">
                                <h4 class="media-heading item-title"><a href="#">1x Standard Product</a></h4>
                                <p class="item-desc">Lorem ipsum dolor</p>
                            </div>
                        </div>
                        <div class="media">
                            <p class="pull-right item-price">$450.00</p>
                            <div class="media-body">
                                <h4 class="media-heading item-title summary">Subtotal</h4>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <a href="#" class="btn btn-theme btn-theme-dark" data-dismiss="modal">Close</a><!--
                                    --><a href="shopping-cart.html" class="btn btn-theme btn-theme-transparent btn-call-checkout">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Popup: Shopping cart items -->

    <!-- Header top bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-right">
                <ul class="list-inline">
                    <li class="icon-user"><a href="login.html"><img src="{{ url('public/store/assets/img/icon-1.png') }}" alt=""/> <span>ورود</span></a></li>
                    <li class="icon-form"><a href="login.html"><img src="{{ url('public/store/assets/img/icon-2.png') }}" alt=""/> <span class="colored">ثبت نام</span></span></a></li>
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
                <div class="logo">
                    <h3 style="font-weight: bold">
                        NGV<span style="color: black">Products</span>
                    </h3>
                </div>
                <!-- /Logo -->

                <!-- Header search -->
                <div class="header-search">
                    <input class="form-control" type="text" placeholder="جستجو ..."/>
                    <button><i class="fa fa-search"></i></button>
                </div>
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
                        <li class="active"><a href="{{ route('home') }}">NGVProducts</a>
                        </li>
                        <li class="megamenu"><a href="#">محصولات</a>
                            <ul>
                                <li class="row" >
                                    <div class="col-md-2">
                                        <h4 class="block-title"><span>مخازن</span></h4>
                                        <ul>
                                            <li><a href="#">نوع اول</a></li>
                                            <li><a href="#">نوع دوم</a></li>
                                            <li><a href="#">نوع سوم</a></li>
                                            <li><a href="#">نوع چهارم</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h4 class="block-title"><span>رگلاتور</span></h4>
                                        <ul>
                                            <li><a href="#">نسل یک</a></li>
                                            <li><a href="#">نسل دو</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h4 class="block-title"><span>شیرمخزن</span></h4>
                                        <ul>
                                            <li><a href="shortcodes.html">مخروطی</a></li>
                                            <li><a href="typography.html">استوانه</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="block-title"><span>Paragraph</span></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                                        <p>Suspendisse molestie est nec tortor placerat, vel pellentesque metus sollicitudin. Suspendisse congue sem mauris, at ultrices felis blandit non.</p>
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
                        <li><a href="category.html">Men</a></li>
                        <li><a href="category.html">Women</a></li>
                        <li><a href="category.html">Kids</a></li>
                        <li><a href="category.html">New</a></li>
                        <li class="sale"><a href="category.html">Sale</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
                <!-- /Navigation -->
            </div>
        </div>
    </header>
    <!-- /HEADER -->

    <!-- CONTENT AREA -->
    <div class="content-area">

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
                        <div class="row">
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

    </div>
    <!-- /CONTENT AREA -->

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">

                    <div class="col-md-3">
                        <div class="widget">
                            <h4 class="widget-title">About Us</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sollicitudin ultrices suscipit. Sed commodo vel mauris vel dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
                            <h4 class="widget-title">News Letter</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
                            <h4 class="widget-title">Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Terms and Conditions</a></li>
                                <li><a href="#">Private Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="widget widget-tag-cloud">
                            <h4 class="widget-title">Item Tags</h4>
                            <ul>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Jeans</a></li>
                                <li><a href="#">Top Sellers</a></li>
                                <li><a href="#">E commerce</a></li>
                                <li><a href="#">Hot Deals</a></li>
                                <li><a href="#">Supplier</a></li>
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">Theme</a></li>
                                <li><a href="#">Website</a></li>
                                <li><a href="#">Isamercan</a></li>
                                <li><a href="#">Themeforest</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-meta">
            <div class="container">
                <div class="row">

                    <div class="col-sm-6">
                        <div class="copyright">Copyright <a href="https://www.mellatweb.com/"> mellatweb.com<a/></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="payments">
                            <ul>
                                <li><img src="{{ url('public/store/assets/img/preview/payments/visa.jpg') }}" alt=""/></li>
                                <li><img src="{{ url('public/store/assets/img/preview/payments/mastercard.jpg') }}" alt=""/></li>
                                <li><img src="{{ url('public/store/assets/img/preview/payments/paypal.jpg') }}" alt=""/></li>
                                <li><img src="{{ url('public/store/assets/img/preview/payments/american-express.jpg') }}" alt=""/></li>
                                <li><img src="{{ url('public/store/assets/img/preview/payments/visa-electron.jpg') }}" alt=""/></li>
                                <li><img src="{{ url('public/store/assets/img/preview/payments/maestro.jpg') }}" alt=""/></li>
                            </ul>
                        </div>
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
<script src="{{ url('public/store/assets/plugins/jquery/jquery-1.11.1.min.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/superfish/js/superfish.min.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/prettyphoto/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/owl-carousel2/owl.carousel.min.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/jquery.sticky.min.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/jquery.easing.min.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/jquery.smoothscroll.min.js') }}"></script>
<script src="{{ url('public/store/assets/plugins/smooth-scrollbar.min.js') }}"></script>

<!-- JS Page Level -->
<script src="{{ url('public/store/assets/js/theme.js') }}"></script>

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{ url('public/store/assets/plugins/jquery.cookie.js') }}"></script>
<script src="{{ url('public/store/assets/js/theme-config.js') }}"></script>
<!--<![endif]-->

</body>
</html>