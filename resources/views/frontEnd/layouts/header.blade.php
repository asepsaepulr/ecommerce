<?php use App\Http\Controllers\Controller;
$mainCategories =  Controller::mainCategories();
?>
<header>
    <!-- header-top-area-start -->
    <div class="header-top-area" id="sticky-header">
        <div class="container-fulied">
            <div class="row ">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <!-- logo-area-start -->
                    <div class="logo">
                        <a href="/"><img src="{{ asset('/frontend/img/team/aldohc.png') }}" width="200" alt="logo" /></a>
                    </div>
                    <!-- logo-area-end -->
                </div>
                <div class="col-lg-7 col-md-7 hidden-sm hidden-xs">
                    <!-- menu-area-start -->
                    <div class="menu-area">
                        <nav>
                            <ul>
                                <li><a href="/">Home</a>
                                </li>
                                <li><a href="{{url('/list-products')}}">Shop </a>
                                 <ul class="sub-menu">
                                     @foreach($mainCategories as $cat)
                                     <h5>    <li><a href="{{ asset('category/'.$cat->id) }}">{{ $cat->name }}</a></li></h5>
                                     @endforeach
                                 </ul>
                             </li>
                             <li><a href="{{url('payment')}}">Payment Confirm</a>
                             </li>
                             <li><a href="{{url('/artikels')}}">Blog</a>
                             </li>
                         </ul>
                     </nav>
                 </div>
                 <!-- menu-area-end -->
             </div>
             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <!-- header-right-area-start -->
                <div class="header-right-area">
                    <ul>
                        <li><a href="#" id="show-search"><i class="icon ion-ios-search-strong"></i></a>
                            <div class="search-content" id="hide-search">
                                <span class="close" id="close-search">
                                    <i class="ion-close"></i>
                                </span>
                                <div class="search-text">
                                    <h1>Search</h1>
                                    <form action="{{ url('/search-products') }}" method="post">{{ csrf_field() }} 
                                        <input type="text" placeholder="Search Product" name="product" />
                                        <button class="btn" type="submit" style="border:0px; height:33px; margin-left:-3px"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @php
                        $cart_datas = App\Cart::all();
                        @endphp
                        <li><a href="/viewcart"><i class="icon ion-bag"></i></a>
                            <span>{{count($cart_datas)}}</span>
                            <div class="mini-cart-sub">
                                <u>
                                <div class="cart-product">
                                    <div class="single-cart">
                                       @foreach($cart_datas as $cart_data)
                                       <?php
                                       $image_products=DB::table('products')->select('image')->where('id',$cart_data->products_id)->get();
                                       ?>
                                       <div class="cart-info">
                                       <div class="cart-img">
                                        @foreach($image_products as $image_product)
                                        <a href="#"><img src="{{url('products/small',$image_product->image)}}" alt="book" /></a>
                                        @endforeach
                                    </div>
                                    <div class="cart-info">
                                        <h5><a href="#">{{$cart_data->product_name}}</a></h5>
                                        <p>1 x ${{$cart_data->price}}</p>
                                    </div>
                                </div>
                            
                                    @endforeach
                                </div>
                            </u>
                            </div>
                            <div class="cart-totals">
                               <!--  -->
                            </div>
                            <div class="cart-bottom">
                                <a href="checkout.html">Check out</a>
                            </div>
                        </div>
                    </li>
                    <li><a href="#" id="show-cart"><i class="icon ion-drag"></i></a>
                        <div class="shapping-area" id="hide-cart">
                            <div class="single-shapping">
                                <span>My Account</span>
                                <ul>
                                    <li><a href="{{url('/viewcart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                    <li><a href="{{url('/orders')}}"><i class="fa fa-circle"></i> Orders</a></li>
                                    @if(Auth::check())
                                    <li><a href="{{url('/myaccount')}}"><i class="fa fa-user"></i> My Account</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-lock"></i> Logout </a>
                                    </li>
                                    @else
                                    <li><a href="{{url('/login_page')}}"><i class="fa fa-lock"></i> Login / Register</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- header-right-area-end -->
        </div>
    </div>
</div>
</div>
<!-- header-top-area-end -->
<!-- mobile-menu-area-start -->
</header>