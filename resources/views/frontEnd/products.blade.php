    @extends('frontEnd.layouts.master')
@section('title','List Products')
@section('slider')
@endsection
@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content text-center">
                    <h2>shop</h2>
                    <ul>
                        <li><a href="#">Home /</a></li>
                        <li class="active"><a href="#">shop</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs-area-end -->
<!-- shop-main-area-start -->
<div class="shop-main-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- page-bar-start -->
                            <div class="page-bar">
                                <div class="shop-tab">
                                    <!-- tab-menu-start -->
                                    <div class="tab-menu-3">
                                        <ul>
                                            <li class="active"><a href="#th" data-toggle="tab"><i class="fa fa-list"></i></a></li>
                                            <li><a href="#list"  data-toggle="tab"><i class="fa fa-th"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- tab-menu-end -->
                                    <!-- toolbar-sorter-start -->
                                    <div class="toolbar-sorter">
                                        <select  class="sorter-options" data-role="sorter">
                                            <option selected="selected" value="Lowest">Sort By: Default</option>
                                            <option value="Highest">Sort By: Name (A - Z)</option>
                                            <option value="Product">Sort By: Name (Z - A)</option>
                                        </select>
                                    </div>
                                    <!-- toolbar-sorter-end -->
                                    <!-- toolbar-sorter-2-start -->
                                    <div class="toolbar-sorter-2">
                                        <select  class="sorter-options" data-role="sorter">
                                            <option selected="selected" value="Lowest">Show: 9</option>
                                            <option value="Highest">Show: 25</option>
                                            <option value="Product">Show: 50</option>
                                        </select>
                                    </div>
                                    <!-- toolbar-sorter-2-end -->
                                </div>
                            </div>
                            <!-- page-bar-end -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right">
                            <!-- shop-right-area-start -->
                            <div class="shop-right-area mb-40-2 mb-30">
                                <!-- tab-area-start -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="th">
                            <?php
                            if($byCate!=""){
                                $products=$list_product;
                                echo '<h2 class="title text-center">Category '.$byCate->name.'</h2>';
                            }else{
                                echo '<h2 class="title text-center">List Products</h2>';
                            }
                            ?>
                            @foreach($products as $product)
                            @if($product->category->status==1)
                            <!-- product-wrapper-start -->
                            <div class="product-wrapper product-wrapper-3 mb-60">

                                <div class="product-img">
                                    <a href="{{url('/product-detail',$product->id)}}">
                                        <img src="{{url('products/small/',$product->image)}}" alt="product" class="primary"/>
                                    </a>
                                   
                                    <div class="product-icon">
                                        <a href="{{url('/product-detail',$product->id)}}"style="width: 200px;" data-toggle="tooltip" title="Add to Cart"><i class="icon ion-bag"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="manufacture-product">
                                        <a href="#">Aldohc</a>
                                    </div>
                                    <a href="{{url('/product-detail',$product->id)}}"><h3>{{$product->p_name}}</h3>
                                     <h4>{!! $product->description !!}</h4>
                                     <h3><?php echo 'Rp.'.number_format($product->price)?></h3>


                                 </div>
                             </div>
                             @endif
                             @endforeach
                         </div>

                         <div class="tab-pane fade" id="list">

                            <div class="row">
                              <?php
                              if($byCate!=""){
                                $products=$list_product;
                                echo '<h2 class="title text-center">Category '.$byCate->name.'</h2>';
                            }else{
                                echo '<h2 class="title text-center">List Products</h2>';
                            }
                            ?>
                            @foreach($products as $product)
                            @if($product->category->status==1)
                            <div class="col-lg-4 col-md-2 col-sm-6 col-xs-12">
                                <!-- product-wrapper-start -->
                                <div class="product-wrapper mb-40">

                                    <div class="product-img">
                                        <a href="{{url('/product-detail',$product->id)}}">
                                            <img src="{{url('products/small/',$product->image)}}" alt="product" class="primary"/>
                                        </a>
                                       
                                        <div class="product-icon">
                                        <a href="{{url('/product-detail',$product->id)}}"style="width: 200px;" data-toggle="tooltip" title="Add to Cart"><i class="icon ion-bag"></i></a>
                                    </div>
                                    </div>
                                    <div class="product-content pt-20">
                                        <div class="manufacture-product">
                                            <a href="#">Aldohc</a>
                                        </div>
                                        <h2> <a href="{{url('/product-detail',$product->id)}}"><h6>{{$product->p_name}}</h6></</h2>
                                            <h3><?php echo 'Rp.'.number_format($product->price)?></h3>
                                        </div>

                                    </div>
                                    <!-- product-wrapper-end -->
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                                    
                                </div>
                                <!-- tab-area-end -->
                                <!-- pagination-area-start -->
                                <div class="pagination-area">
                                    <div class="pagination-number">
                                        <ul>
                                      
                                        </ul>
                                    </div>
                                    <div class="product-count">
                                         
                                    </div>
                                </div>
                                <!-- pagination-area-end -->
                            </div>
                            <!-- shop-right-area-end -->
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <!-- shop-left-area-start -->
                            <div class="shop-left-area">
                                <!-- single-shop-start -->
                                <div class="single-shop mb-40">
                                    <div class="Categories-title">
                                    </div>
                                    <div class="Categories-list">
                                     @include('frontEnd.layouts.category_menu')
                                    </div>
                                </div>
                        
                            </div>
                            <!-- shop-left-area-end -->
                        </div>
                    </div>  
                </div>
            </div>
<!-- shop-main-area-end -->
<!-- newslatter-area-start -->
<div class="newslatter-area pt-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bt-top ptb-80">
                    <div class="newlatter-content text-center">
                        <h6>Special Offers For Subscribers</h6>
                        <h3>Ten Percent Member Discount</h3>
                        <p>Subscribe to our newsletters now and stay up to date with new collections, the latest lookbooks and exclusive offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your email address here..."/>
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- newslatter-area-end -->
<!-- footer-area-start -->

<!-- footer-area-end -->
<!-- modal-area-start -->
<div class="modal-area">
    <!-- single-modal-start -->
    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-img">
                        <div class="single-img">
                            <img src="{{ asset('/frontend/img/product/2.jpg') }}" alt="hat" class="primary" />
                        </div>
                    </div>
                    <div class="model-text">
                        <h2><a href="#">Pyrolux Pyrostone</a> </h2>
                        <div class="product-rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star-o"></i></a>
                        </div>
                        <div class="price-rate">
                            <span class="old-price"><del>$30.00</del></span>
                            <span class="new-price">$28.00</span>
                        </div>
                        <div class="short-description mt-20">
                            <p>Bacon ipsum dolor sit amet ut nostrud chuck, voluptate adipisicing veniam kielbasa fugiat ex spare ribs. Incididunt sint officia non cow, ut et. Cillum porchetta tongue occaecat laborum bacon aliquip fatback flank dolore short loin ball tip bresaola deserunt dolor. Shoulder fugiat ut in ut tail swine dolore, capicola ullamco beef occaecat meatball. Laboris turkey in et chuck deserunt ad incididunt do.</p>
                        </div>
                        <form action="#">
                            <input type="number" value="1"/>
                            <button type="submit">Add to cart</button>
                        </form>
                        <div class="product-meta">
                            <span>
                                Categories: 
                                <a href="#">albums</a>,<a href="#">Music</a>
                            </span>
                            <span>
                                Tags: 
                                <a href="#">albums</a>,<a href="#">Music</a>
                            </span>
                        </div>
                        <!-- social-icon-start -->
                        <div class="social-icon mt-20">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" title="Share on Twitter"><i  class="fa fa-twitter"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" title="Email to a Friend"><i class="fa fa-envelope-o"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" title="Pin on Pinterest"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" title="Share on Google+"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                        <!-- social-icon-end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single-modal-end -->
</div>
</body>
</html>
@endsection