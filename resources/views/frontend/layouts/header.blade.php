<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-heart"></i>
                                @if (Session()->get('language') == 'bangla') ইচ্ছেতালিকা @else Wishlist @endif
                            </a>
                        </li>
                        <li><a href="#"><i class="icon fa fa-shopping-cart"></i>
                                @if (Session()->get('language') == 'bangla') আমার বাঁজার @else My Cart @endif
                            </a>
                        </li>
                        {{-- <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li> --}}
                        <li>
                            @auth
                            <a href="{{ route('user-dashboard') }}"><i class="fa fa-tachometer"></i>
                                @if (Session()->get('language') == 'bangla') ড্যাশবোর্ড @else Dashboard @endif
                            </a>
                            @else
                            {{-- <a href="#"><i class="icon fa fa-user"></i>My Profile</a> --}}
                            @endauth
                        </li>
                        <li>
                            @auth
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off" aria-hidden="true"></i>
                                @if (Session()->get('language') == 'bangla') সাইন আউট @else Sign Out @endif
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @else
                            <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>
                                @if (Session()->get('language') == 'bangla') লগইন / রেজিস্টার @else Login/Register @endif
                            </a>
                            @endauth
                        </li>
                    </ul>
                </div><!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                <span class="value">@if (Session()->get('language') == 'bangla') মুদ্রা নির্বাচন করুন @else Currency @endif
                                </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                @if (Session()->get('language') == 'bangla')
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">টাকা</a></li>
                                    @else
                                    <li><a href="#">টাকা</a></li>
                                    <li><a href="#">USD</a></li>
                                @endif
                            </ul>
                        </li>

                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                <span class="value">
                                     @if (Session()->get('language') == 'bangla') ভাষা পরিবর্তন করুন @else English @endif
                                </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                @if (Session()->get('language') == 'bangla')
                                    <li><a href=" {{ route('english-language') }} ">English</a></li>
                                @else
                                    <li><a href=" {{ route('bangla-language') }} ">বাংলা</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul><!-- /.list-unstyled -->
                </div><!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div><!-- /.header-top-inner -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo">
                        <a href="home.html">

                            <img src=" {{ asset('frontend') }}/assets/images/logo.png" alt="header-image" height="70px"
                                width="100px">

                        </a>
                    </div><!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div><!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">

                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown">

                                        <a class="dropdown-toggle" data-toggle="dropdown"
                                            href="category.html">Categories <b class="caret"></b></a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Watches</a></li>

                                        </ul>
                                    </li>
                                </ul>

                                <input class="search-field" placeholder="Search here..." />

                                <a class="search-button" href="#"></a>

                            </div>
                        </form>
                    </div><!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div><!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart">
                        <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket">
                                    <i class="glyphicon glyphicon-shopping-cart"></i>
                                </div>
                                <div class="basket-item-count"><span class="count">2</span></div>
                                <div class="total-price-basket">
                                    @if (Session()->get('language') == 'bangla')
                                        <span class="lbl">মোট বাঁজার -</span>
                                    @else
                                        <span class="lbl">cart -</span>
                                    @endif
                                    <span class="total-price">
                                        @if (Session()->get('language') == 'bangla')
                                        <span class="sign">৳</span><span class="value"> {{ bn_price(600.00) }} </span>
                                        @else
                                        <span class="sign">$</span><span class="value">600.00</span>
                                        @endif
                                    </span>
                                </div>

                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image">
                                                <a href="detail.html"><img
                                                        src=" {{ asset('frontend') }}/assets/images/cart.jpg"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">

                                            <h3 class="name"><a href="index8a95.html?page-detail">Simple Product</a>
                                            </h3>
                                            <div class="price">$600.00</div>
                                        </div>
                                        <div class="col-xs-1 action">
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div><!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>

                                <div class="clearfix cart-total">
                                    <div class="pull-right">

                                        <span class="text">Sub Total :</span><span class='price'>$600.00</span>

                                    </div>
                                    <div class="clearfix"></div>

                                    <a href="checkout.html"
                                        class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div><!-- /.cart-total-->

                            </li>
                        </ul><!-- /.dropdown-menu-->
                    </div><!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div><!-- /.top-cart-row -->
            </div><!-- /.row -->

        </div><!-- /.container -->

    </div><!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw">
                                    <a href=" {{ route('frontend') }} " data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown"> @if (Session()->get('language') == 'bangla') হোম @else Home @endif</a>
                                </li>
                                @php
                                $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                                @endphp
                                @foreach ($categories as $category)
                                <li class="dropdown yamm mega-menu">
                                    <a href="#" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                                        @if (Session()->get('language') == 'bangla')
                                            {{ $category->category_name_bn }}
                                         @else
                                            {{ $category->category_name_en }}
                                        @endif
                                    </a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">
                                                    @php
                                                    $subcategories = App\Models\Subcategory::where('category_id',
                                                    $category->category_id)->orderBy('subcategory_name_en',
                                                    'ASC')->get();
                                                    @endphp
                                                    @foreach ($subcategories as $subcategory)
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        @if (Session()->get('language') == 'bangla')
                                                            <a href="{{ url('admin/subCatg-wise/products/' .$subcategory->subcategory_id . '/' . $subcategory->subcategory_slug_bn) }}"> {{ $subcategory->subcategory_name_bn }} </a>
                                                        @else
                                                            <a href="{{ url('admin/subCatg-wise/products/' .$subcategory->subcategory_id . '/' . $subcategory->subcategory_slug_en) }}"> {{ $subcategory->subcategory_name_en  }} </a>
                                                        @endif
                                                        @php
                                                            $subsubCateg = App\Models\SubsubCategory::where('subcategory_id', $subcategory->subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
                                                        @endphp
                                                        <ul class="links">
                                                            @foreach ($subsubCateg as $subsubCat)
                                                                <li>
                                                                    @if (Session()->get('language') == 'bangla')
                                                                        <a href="#"> {{ $subsubCat->subsubcategory_name_bn }} </a>
                                                                    @else
                                                                        <a href="#"> {{ $subsubCat->subsubcategory_name_en  }} </a>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div><!-- /.col -->
                                                    @endforeach
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach

                                <li class="dropdown  navbar-right special-menu">
                                    @if (Session()->get('language') == 'bangla')
                                        <a href="#">আজকের ছাড় সমূহ</a>
                                    @else
                                        <a href="#">Todays offer</a>
                                    @endif
                                </li>

                            </ul><!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div><!-- /.nav-outer -->
                    </div><!-- /.navbar-collapse -->

                </div><!-- /.nav-bg-class -->
            </div><!-- /.navbar-default -->
        </div><!-- /.container-class -->

    </div><!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->
</header>
