@extends('layouts.frontendLayouts')
@section('frontendContent')


<div class="site-content space-bottom-3 pt-4" id="content">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area col-lg-8 order-2">
                <div
                    class="shop-control-bar d-lg-flex justify-content-between align-items-center mb-5 text-center text-md-left">
                    <div class="shop-control-bar__left mb-4 m-lg-0">
                        <p class="woocommerce-result-count m-0">Showing {{ $relatedBooks->firstItem() }}-{{
                            $relatedBooks->lastItem() }} of {{ $relatedBooks->total() }} results</p>
                    </div>
                    <div class="shop-control-bar__right d-md-flex align-items-center">
                        <form id="sorting" action="{{ request()->getRequestUri() }}"
                            class="woocommerce-ordering mb-4 m-md-0" method="get">

                            <select class="js-select selectpicker dropdown-select orderby" name="orderby"
                                data-style="border-bottom shadow-none outline-none py-2">
                                <option disabled selected>Sort by Default</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>

                        </form>


                    </div>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-one-example1" role="tabpanel"
                        aria-labelledby="pills-one-example1-tab">

                        <ul
                            class="products list-unstyled row no-gutters row-cols-2 row-cols-lg-3 row-cols-wd-4 border-top border-left mb-6">
                            @foreach ($relatedBooks as $book)
                            <li class="product col">
                                <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                        <div class="woocommerce-loop-product__thumbnail">
                                            <a href="{{ route('frontend.product.show', $book->slug) }}">
                                                <img src="{{ $book->thumbnail }}"
                                                    class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                    alt="{{ $book->title }}"></a>
                                        </div>
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate">
                                                <a href="{{ route('frontend.product.class', $book->class->slug) }}">{{
                                                    $book->class->name }}</a>
                                                <a href="{{ route('frontend.product.subject', $book->subject->slug) }}">{{
                                                    $book->subject->name }}</a>
                                            </div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="{{ route('frontend.product.show',$book->slug) }}">{{
                                                    $book->title }}</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate"><a
                                                    href="{{ route('frontend.author.all', $book->author->id) }}"
                                                    class="text-gray-700">{{ $book->author->name }}</a></div>
                                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                                @if ($book->price !=null)
                                                @if ($book->selling_price)
                                                <span class="woocommerce-Price-amount amount mr-2"
                                                    style="color:#888; text-decoration:line-through;"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>{{ $book->price
                                                    }}</span>
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>{{
                                                    $book->selling_price
                                                    }}</span>

                                                @else
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>{{
                                                    $newBook->price
                                                    }}</span>
                                                @endif

                                                @else
                                                <span class="woocommerce-Price-amount amount">Free</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                            @auth('user')


                                            <a href="{{ route('cart.add', $book->id) }}"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto addToCart"
                                                data-original-title="ADD TO CART">
                                                <span class="product__add-to-cart">ADD TO CART</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="flaticon-icon-126515"></i></span>
                                            </a>
                                            @endauth
                                            @guest('user')
                                            <a href="{{ route('user.login') }}"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                target="__blank" data-original-title="Login">
                                                <span class="product__add-to-cart">Login</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="flaticon-icon-126515"></i></span>
                                            </a>
                                            @endguest

                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>

                    </div>

                </div>

                {{ $relatedBooks->onEachSide(1)->appends(request()->query())->links() }}

            </div>
            <div id="secondary" class="sidebar widget-area col-lg-4 order-1" role="complementary">
                <form action="{{ request()->getRequestUri() }}" method="get">
                    @csrf

                    <div id="widgetAccordion">
                        <div id="woocommerce_product_categories-2"
                            class="widget p-4d875 border woocommerce widget_product_categories">
                            <div id="widgetHeadingOne" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="v1.html#"
                                    data-toggle="collapse" data-target="#widgetCollapseOne" aria-expanded="true"
                                    aria-controls="widgetCollapseOne">
                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Categories</h3>
                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                    </svg>
                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>
                            <div id="widgetCollapseOne" class="mt-3 widget-content collapse show"
                                aria-labelledby="widgetHeadingOne" data-parent="#widgetAccordion">
                                <ul class="product-categories">
                                    <li class="cat-item cat-item-9 cat-parent">
                                        <a href="v3.html">Clothing</a>
                                        <ul class="children">
                                            <li class="cat-item cat-item-121"><a href="v1.html#/clothing/bags/">Bags</a>
                                            </li>
                                            <li class="cat-item cat-item-44"><a
                                                    href="v1.html#/clothing/blouses/">Blouses</a></li>
                                            <li class="cat-item cat-item-41"><a
                                                    href="v1.html#/clothing/dresses/">Dresses</a></li>
                                            <li class="cat-item cat-item-56"><a
                                                    href="v1.html#/clothing/footwear/">Footwear</a></li>
                                            <li class="cat-item cat-item-54"><a href="v1.html#/clothing/hats/">Hats</a>
                                            </li>
                                            <li class="cat-item cat-item-10"><a
                                                    href="v1.html#/clothing/hoodies/">Hoodies</a></li>
                                            <li class="cat-item cat-item-55"><a
                                                    href="v1.html#/clothing/shirts/">Shirts</a>
                                            </li>
                                            <li class="cat-item cat-item-47"><a
                                                    href="v1.html#/clothing/skirts/">Skirts</a>
                                            </li>
                                            <li class="cat-item cat-item-14"><a
                                                    href="v1.html#/clothing/t-shirts/">T-shirts</a></li>
                                            <li class="cat-item cat-item-49"><a
                                                    href="v1.html#/clothing/trousers/">Trousers</a></li>
                                        </ul>
                                    </li>
                                    <li class="cat-item cat-item-69 cat-parent">
                                        <a href="v3.html">Electronics</a>
                                        <ul class="children">
                                            <li class="cat-item cat-item-71 cat-parent"><a
                                                    href="v1.html#/electronics/cameras/">Cameras</a>
                                                <ul class="children">
                                                    <li class="cat-item cat-item-114"><a
                                                            href="v1.html#/electronics/cameras/accessories/">Accessories</a>
                                                    </li>
                                                    <li class="cat-item cat-item-112"><a
                                                            href="v1.html#/electronics/cameras/lenses/">Lenses</a></li>
                                                </ul>
                                            </li>
                                            <li class="cat-item cat-item-99"><a
                                                    href="v1.html#/electronics/dvd-players/">DVD
                                                    Players</a></li>
                                            <li class="cat-item cat-item-72"><a
                                                    href="v1.html#/electronics/headphones/">Headphones</a></li>
                                            <li class="cat-item cat-item-91"><a
                                                    href="v1.html#/electronics/mp3-players/">MP3
                                                    Players</a></li>
                                            <li class="cat-item cat-item-90"><a
                                                    href="v1.html#/electronics/radios/">Radios</a></li>
                                            <li class="cat-item cat-item-70"><a
                                                    href="v1.html#/electronics/televisions/">Televisions</a></li>
                                        </ul>
                                    </li>
                                    <li class="cat-item cat-item-65 cat-parent">
                                        <a href="v3.html">Kitchen</a>
                                        <ul class="children">
                                            <li class="cat-item cat-item-102"><a
                                                    href="v1.html#/kitchen/blenders/">Blenders</a></li>
                                            <li class="cat-item cat-item-103"><a
                                                    href="v1.html#/kitchen/colanders/">Colanders</a></li>
                                            <li class="cat-item cat-item-68"><a
                                                    href="v1.html#/kitchen/kettles/">Kettles</a>
                                            </li>
                                            <li class="cat-item cat-item-101"><a
                                                    href="v1.html#/kitchen/knives/">Knives</a>
                                            </li>
                                            <li class="cat-item cat-item-66"><a href="v1.html#/kitchen/pots-pans/">Pots
                                                    &amp; Pans</a></li>
                                            <li class="cat-item cat-item-67"><a
                                                    href="v1.html#/kitchen/toasters/">Toasters</a></li>
                                        </ul>
                                    </li>
                                    <li class="cat-item cat-item-11 cat-parent"><a href="v3.html">Music</a>
                                        <ul class="children">
                                            <li class="cat-item cat-item-15"><a href="v1.html#/music/albums/">Albums</a>
                                            </li>
                                            <li class="cat-item cat-item-100"><a href="v1.html#/music/mp3/">MP3</a></li>
                                            <li class="cat-item cat-item-13"><a
                                                    href="v1.html#/music/singles/">Singles</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="cat-item cat-item-12"><a href="v3.html">Posters</a></li>
                                    <li class="cat-item cat-item-31"><a href="v3.html">Scuba gear</a></li>
                                    <li class="cat-item cat-item-45"><a href="v3.html">Sweatshirts</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="woocommerce_product_categories-2"
                            class="widget p-4d875 border woocommerce widget_product_categories">
                            <div id="subject" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="v1.html#"
                                    data-toggle="collapse" data-target="#subjectCollapse" aria-expanded="true"
                                    aria-controls="widgetCollapseOne">
                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Subject</h3>
                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                    </svg>
                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>
                            <div id="subjectCollapse" class="mt-3 widget-content collapse show"
                                aria-labelledby="subject" data-parent="#widgetAccordion">
                                <ul class="product-categories">
                                    <li class="cat-item cat-item-9 cat-parent">
                                        <a href="v3.html">Clothing</a>
                                        <ul class="children">
                                            <li class="cat-item cat-item-121"><a href="v1.html#/clothing/bags/">Bags</a>
                                            </li>
                                            <li class="cat-item cat-item-44"><a
                                                    href="v1.html#/clothing/blouses/">Blouses</a></li>
                                            <li class="cat-item cat-item-41"><a
                                                    href="v1.html#/clothing/dresses/">Dresses</a></li>
                                            <li class="cat-item cat-item-56"><a
                                                    href="v1.html#/clothing/footwear/">Footwear</a></li>
                                            <li class="cat-item cat-item-54"><a href="v1.html#/clothing/hats/">Hats</a>
                                            </li>
                                            <li class="cat-item cat-item-10"><a
                                                    href="v1.html#/clothing/hoodies/">Hoodies</a></li>
                                            <li class="cat-item cat-item-55"><a
                                                    href="v1.html#/clothing/shirts/">Shirts</a>
                                            </li>
                                            <li class="cat-item cat-item-47"><a
                                                    href="v1.html#/clothing/skirts/">Skirts</a>
                                            </li>
                                            <li class="cat-item cat-item-14"><a
                                                    href="v1.html#/clothing/t-shirts/">T-shirts</a></li>
                                            <li class="cat-item cat-item-49"><a
                                                    href="v1.html#/clothing/trousers/">Trousers</a></li>
                                        </ul>
                                    </li>
                                    <li class="cat-item cat-item-69 cat-parent">
                                        <a href="v3.html">Electronics</a>
                                        <ul class="children">
                                            <li class="cat-item cat-item-71 cat-parent"><a
                                                    href="v1.html#/electronics/cameras/">Cameras</a>
                                                <ul class="children">
                                                    <li class="cat-item cat-item-114"><a
                                                            href="v1.html#/electronics/cameras/accessories/">Accessories</a>
                                                    </li>
                                                    <li class="cat-item cat-item-112"><a
                                                            href="v1.html#/electronics/cameras/lenses/">Lenses</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="cat-item cat-item-99"><a
                                                    href="v1.html#/electronics/dvd-players/">DVD
                                                    Players</a></li>
                                            <li class="cat-item cat-item-72"><a
                                                    href="v1.html#/electronics/headphones/">Headphones</a></li>
                                            <li class="cat-item cat-item-91"><a
                                                    href="v1.html#/electronics/mp3-players/">MP3
                                                    Players</a></li>
                                            <li class="cat-item cat-item-90"><a
                                                    href="v1.html#/electronics/radios/">Radios</a></li>
                                            <li class="cat-item cat-item-70"><a
                                                    href="v1.html#/electronics/televisions/">Televisions</a></li>
                                        </ul>
                                    </li>
                                    <li class="cat-item cat-item-65 cat-parent">
                                        <a href="v3.html">Kitchen</a>
                                        <ul class="children">
                                            <li class="cat-item cat-item-102"><a
                                                    href="v1.html#/kitchen/blenders/">Blenders</a></li>
                                            <li class="cat-item cat-item-103"><a
                                                    href="v1.html#/kitchen/colanders/">Colanders</a></li>
                                            <li class="cat-item cat-item-68"><a
                                                    href="v1.html#/kitchen/kettles/">Kettles</a>
                                            </li>
                                            <li class="cat-item cat-item-101"><a
                                                    href="v1.html#/kitchen/knives/">Knives</a>
                                            </li>
                                            <li class="cat-item cat-item-66"><a href="v1.html#/kitchen/pots-pans/">Pots
                                                    &amp; Pans</a></li>
                                            <li class="cat-item cat-item-67"><a
                                                    href="v1.html#/kitchen/toasters/">Toasters</a></li>
                                        </ul>
                                    </li>
                                    <li class="cat-item cat-item-11 cat-parent"><a href="v3.html">Music</a>
                                        <ul class="children">
                                            <li class="cat-item cat-item-15"><a href="v1.html#/music/albums/">Albums</a>
                                            </li>
                                            <li class="cat-item cat-item-100"><a href="v1.html#/music/mp3/">MP3</a></li>
                                            <li class="cat-item cat-item-13"><a
                                                    href="v1.html#/music/singles/">Singles</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="cat-item cat-item-12"><a href="v3.html">Posters</a></li>
                                    <li class="cat-item cat-item-31"><a href="v3.html">Scuba gear</a></li>
                                    <li class="cat-item cat-item-45"><a href="v3.html">Sweatshirts</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="Authors" class="widget widget_search widget_author p-4d875 border">
                            <div id="widgetHeading21" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="v1.html#"
                                    data-toggle="collapse" data-target="#widgetCollapse21" aria-expanded="true"
                                    aria-controls="widgetCollapse21">
                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Author</h3>
                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                    </svg>
                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>
                            <div id="widgetCollapse21" class="mt-4 widget-content collapse show"
                                aria-labelledby="widgetHeading21" data-parent="#widgetAccordion">
                                <form class="form-inline my-2 overflow-hidden">
                                    <div class="input-group flex-nowrap w-100">
                                        <div class="input-group-prepend">
                                            <i
                                                class="glph-icon flaticon-loupe py-2d75 bg-white-100 border-white-100 text-dark pl-3 pr-0 rounded-0"></i>
                                        </div>
                                        <input
                                            class="form-control bg-white-100 py-2d75 height-4 border-white-100 rounded-0"
                                            type="search" placeholder="Search" aria-label="Search">
                                    </div>
                                    <button class="btn btn-outline-success my-2 my-sm-0 sr-only"
                                        type="submit">Search</button>
                                </form>
                                <ul class="product-categories">
                                    <li class="cat-item cat-item-9 cat-parent">
                                        <a href="../others/authors-single.html">A. J. Finn</a>
                                    </li>
                                    <li class="cat-item cat-item-69 cat-parent">
                                        <a href="../others/authors-single.html">Anne Frank</a>
                                    </li>
                                    <li class="cat-item cat-item-65 cat-parent">
                                        <a href="../others/authors-single.html">Camille Pagán</a>
                                    </li>
                                    <li class="cat-item cat-item-11 cat-parent"><a
                                            href="../others/authors-single.html">Daniel H. Pink</a>
                                    </li>
                                    <li class="cat-item cat-item-12"><a href="../others/authors-single.html">Danielle
                                            Steel</a></li>
                                    <li class="cat-item cat-item-31"><a href="../others/authors-single.html">David
                                            Quammen</a></li>
                                </ul>
                            </div>
                        </div>
                        <button class="btn btn-dark rounded-0 btn-wide py-3 font-weight-medium w-100">Apply Filter</button>




                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('customJs')
<script>
    $('#sorting select').on('change',function(){
            $('#sorting').submit()
        })
        
</script>
@endpush
@endsection