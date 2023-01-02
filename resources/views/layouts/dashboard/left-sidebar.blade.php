<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                    aria-expanded="false"><img src="{{ url('public/dashboard/assets/images/users/Sample_User_Icon.png') }}" alt="user-img" class="img-circle"><span
                        class="hide-menu">Mark Jeckson</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                    <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                    <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                    <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
            <li> <a class="waves-effect waves-dark" href="{{ route('admin-products') }}" aria-expanded="false"><i
                        class="fa fa-circle-o text-danger"></i><span class="hide-menu">محصولات</span></a>
            </li>
            <li> <a class="waves-effect waves-dark" href="{{ route('admin-catagories') }}" aria-expanded="false"><i
                class="fa fa-circle-o text-danger"></i><span class="hide-menu">دسته بندی محصولات</span></a>
            </li>
            <li> <a class="waves-effect waves-dark" href="{{ route('admin-prices-show-list') }}" aria-expanded="false"><i
                class="fa fa-circle-o text-danger"></i><span class="hide-menu">قیمت ها</span></a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="{{ route('admin-inventory-for-each-store') }}" aria-expanded="false">
                    <i class="fa fa-circle-o text-danger"></i><span class="hide-menu">موجودی محصولات در هر انبار</span>
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="{{ route('admin-inventory') }}" aria-expanded="false">
                    <i class="fa fa-circle-o text-danger"></i><span class="hide-menu">گزارش کلی انبار </span>
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="{{ route('admin-store') }}" aria-expanded="false">
                    <i class="fa fa-circle-o text-danger"></i><span class="hide-menu">انبار</span>
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="{{ route('admin-orders') }}" aria-expanded="false">
                    <i class="fa fa-circle-o text-danger"></i><span class="hide-menu">سفارشات</span>
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="{{ route('admin-methods') }}" aria-expanded="false">
                    <i class="fa fa-circle-o text-danger"></i><span class="hide-menu">!methods</span>
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="{{ route('admin-roles') }}" aria-expanded="false">
                    <i class="fa fa-circle-o text-danger"></i><span class="hide-menu">!نقش ها</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
