<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                    aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"><span
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
            <li>
                <a class="waves-effect waves-dark" href="{{ route('admin-inventory') }}" aria-expanded="false">
                    <i class="fa fa-circle-o text-danger"></i><span class="hide-menu">موجودی محصولات</span>
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="{{ route('admin-store') }}" aria-expanded="false">
                    <i class="fa fa-circle-o text-danger"></i><span class="hide-menu">انبار</span>
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="{{ route('admin-methods') }}" aria-expanded="false">
                    <i class="fa fa-circle-o text-danger"></i><span class="hide-menu">!methods</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
