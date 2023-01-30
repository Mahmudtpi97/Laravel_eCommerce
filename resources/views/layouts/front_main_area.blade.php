<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> @yield('page_title','E-Shop - E-commerce Template')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('frontend/assets/img/favicon.png')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('frontend/assets/css/owl.carousel.min.css')}}" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    @foreach ($socials as $social_link)
                        <a class="text-dark px-2" href="{{$social_link->link}}">
                            <i class="{{$social_link->icon}}"></i>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{url('/')}}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="{{url('search_product')}}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search_product" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="{{URL('cart')}}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">{{$cartItems->sum('quantity') }}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
 <!-- Navbar Start -->
 <div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="@if ($cat_active == 'home_cat') show @endif position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light collapse" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                <div class="navbar-nav w-100 overflow-hidden">
                    @foreach ($categories as $category)
                        @php
                            $a = count($category->SubCategory);
                        @endphp
                        {{-- @if ($a <= 0) --}}
                            {{-- @foreach ($categories as $category)
                                <a href="{{route('product_by_cat',['id'=>$category->id] )}}" class="nav-item nav-link" >{{$category->title}}</a>
                            @endforeach --}}

                        {{-- @else --}}
                            <div class="nav-item @if($a >= 1)dropdown @endif">
                                <a href="{{route('product_by_cat',['id'=>$category->id] )}}" class="nav-link" @if($a >= 1)data-toggle="dropdown" @endif>
                                    {{$category->title}} @if($a >= 1)<i class="fa fa-angle-down float-right mt-1"></i>@endif
                                </a>
                                    <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                        @foreach ($category->SubCategory as $sub_cat)
                                                <a href="{{route('product_by_sub_cat',['id'=>$sub_cat->id] )}}" class="nav-item nav-link">{{$sub_cat->title}}</a>
                                        @endforeach
                                    </div>
                             </div>
                        {{-- @endif --}}

                    @endforeach

                 {{-- @foreach ($products as $cat)
                    @php
                        $cat_id = $cat->categories->id;
                    @endphp
                @endforeach --}}

                {{-- @if ($cat_id == 1) --}}
                    {{-- @foreach ($categories as $category)
                        <a href="{{route('product_by_cat',['id'=>$category->id] )}}" class="nav-item nav-link" >{{$category->title}}</a>
                    @endforeach --}}
                   {{-- @else
                   <h2 class="text-center h3 w-100 mt-2 text-danger">Product Not Avilable</h2>
                   @endif --}}

                </div>
            </nav>
        </div>

       <!-- menu_area -->
        @php
             $user_id = Session::get('id');
        @endphp

         <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{URL('/')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{URL('shop')}}" class="nav-item nav-link">Shop</a>
                        {{-- <a href="{{URL('product_details')}}" class="nav-item nav-link">Shop Detail</a> --}}
                        <a href="{{URL('cart')}}" class="nav-item nav-link">Cart</a>
                        @if ($user_id != Null)
                                <a href="{{URL('checkout')}}" class="nav-item nav-link">Checkout</a>
                            @else
                                <a href="{{URL('user_login')}}" class="nav-item nav-link">Checkout</a>
                        @endif
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{URL('cart')}}" class="dropdown-item">Shopping Cart</a>
                                @if ($user_id != Null)
                                    <a href="{{URL('checkout')}}" class="dropdown-item">Checkout</a>
                                 @else
                                    <a href="{{URL('user_login')}}" class="dropdown-item">Checkout</a>
                                @endif
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">


                        @if ($user_id !== Null)
                                <a href="{{url('user_logout')}}" class="nav-item nav-link">Logout</a>
                           @else
                                <a href="{{url('user_login')}}" class="nav-item nav-link">Login</a>
                                <a href="{{url('user_login')}}" class="nav-item nav-link">Register</a>
                        @endif

                    </div>
                </div>
            </nav>
            <!--Home Carousel -->
            @yield('slider')

        </div>

    </div>
 </div>

       @yield('main_area')

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
                </a>
                <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed by <a class="text-dark font-weight-semi-bold" href="https://mahmudtpi97.github.io/Portfolio.com">Mahmudul Hasan</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="{{asset('img/payments.png')}}" alt="">
            </div>
        </div>
    </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('frontend/assets/js/easing/easing.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/owlcarousel/owl.carousel.min.js')}}"></script>

        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="{{asset('frontend/assets/js/main.js')}}"></script>
</body>

</html>


