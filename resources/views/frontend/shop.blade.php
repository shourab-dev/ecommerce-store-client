@extends('layouts.frontendLayouts')
@section('frontendContent')


<div class="site-content space-bottom-3 pt-4" id="content">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area col-lg-8 order-2">
                <div
                    class="shop-control-bar d-lg-flex d-none justify-content-between align-items-center mb-5 text-center text-md-left">
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
                            @forelse ($relatedBooks as $book)
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
                                                @if(isset($book->class))
                                                <a href="{{ route('frontend.product.class', $book->class->slug) }}">{{
                                                    $book->class->name }}</a>

                                                @endif
                                            </div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="{{ route('frontend.product.show',$book->slug) }}">{{
                                                    $book->title }}</a>
                                            </h2>
                                            <div class="font-size-2  mb-1 text-truncate">
                                                @if(isset($book->author))
                                                <a href="{{ route('frontend.author.all', $book->author->id) }}"
                                                    class="text-gray-700">{{ $book->author->name }}</a>
                                                @endif
                                            </div>
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
                                                    $book->price
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
                            @empty
                            <li class="text-center d-block col-12 mx-auto mt-5">
                                <h3 class="d-block">Nothing Found! 👀</h3>
                            </li>
                            @endforelse

                        </ul>

                    </div>

                </div>

                {{ $relatedBooks->onEachSide(1)->appends(request()->query())->links() }}

            </div>
            <div id="secondary" class="sidebar widget-area col-lg-4 order-1 d-lg-block d-none" role="complementary">
                <form action="{{ request()->getRequestUri() }}" method="get">


                    <div id="widgetAccordion">
                        <div id="woocommerce_product_categories-2"
                            class="widget p-4d875 border woocommerce widget_product_categories">
                            <div id="widgetHeadingOne" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="v1.html#"
                                    data-toggle="collapse" data-target="#widgetCollapseOne" aria-expanded="true"
                                    aria-controls="widgetCollapseOne">
                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Categories </h3>
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
                                <div class="row justify-content-between">

                                    @foreach ($classRooms as $class)
                                    <label class="border border-1 px-2 py-1" style="border-radius:25px;"
                                        for="categoryMobile{{ $class->id }}">

                                        <input {{ in_array($class->id,request()->category ?? []) ? "checked" : "" }}
                                        type="checkbox" value="{{ $class->id }}" name="category[]" id="categoryMobile{{
                                        $class->id }}"> {{ $class->name }}
                                    </label>

                                    @endforeach
                                </div>

                            </div>
                        </div>
                        {{-- ! SUBJECT IS DEDECTED IN PRODUCTION --}}
                        <div id="woocommerce_product_categories-2"
                            class="widget p-4d875 border woocommerce widget_product_categories">
                            <div id="subject" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="v1.html#"
                                    data-toggle="collapse" data-target="#subjectCollapse" aria-expanded="true"
                                    aria-controls="widgetCollapseOne">
                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Accessories</h3>
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
                                <div class="row justify-content-between">
                                    @foreach ($subjects as $subject)
                                    <label class="border border-1 px-2 py-1" style="border-radius:25px;"
                                        for="subjectMobile{{ $subject->id }}">
                                        <input {{ in_array($subject->id,request()->products ?? []) ? "checked" : "" }}
                                        type="checkbox" name="products[]" value="{{ $subject->id }}" id="subjectMobile{{
                                        $subject->id }}"> {{ str($subject->name)->headline() }}
                                    </label>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- ! SUBJECT IS DEDECTED IN PRODUCTION --}}
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
                                <div class="row justify-content-between">
                                    @foreach ($authors as $author)
                                    <label class="border border-1 px-2 py-1" style="border-radius:25px;"
                                        for="authorMobile{{ $author->id }}">
                                        <input {{ in_array($author->id,request()->authors ?? []) ? "checked" : "" }}
                                        type="checkbox" name="authors[]" value="{{ $author->id }}" id="authorMobile{{
                                        $author->id }}"> {{ str()->headline($author->name) }}
                                    </label>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-dark rounded-0 btn-wide py-3 font-weight-medium w-100">Apply
                            Filter</button>




                    </div>
                </form>
            </div>
            <div class="text-right col-12 d-block d-lg-none mb-4">
                <a class="text-dark filterBtn" href="#"><i class="fas fa-sliders-h"></i> Filter</a>
            </div>
            <div class="sidebarFilter">
                <div class="text-right my-3">
                    <button type="button" class="closeFilterBtn"><i class="fas fa-times"></i></button>
                </div>
                <form action="{{ request()->getRequestUri() }}" method="get">


                    <div id="widgetAccordion">
                        <div id="woocommerce_product_categories-2"
                            class="widget p-4d875 border woocommerce widget_product_categories">
                            <div id="widgetHeadingOne" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="v1.html#"
                                    data-toggle="collapse" data-target="#widgetCollapseOne" aria-expanded="true"
                                    aria-controls="widgetCollapseOne">
                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Categories </h3>

                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>
                            <div id="widgetCollapseOne" class="mt-3 widget-content collapse show"
                                aria-labelledby="widgetHeadingOne" data-parent="#widgetAccordion">
                                <div class="row justify-content-between">

                                    @foreach ($classRooms as $class)
                                    <label class="border border-1 px-2 py-1" style="border-radius:25px;"
                                        for="category{{ $class->id }}">

                                        <input {{ in_array($class->id,request()->category ?? []) ? "checked" : "" }}
                                        type="checkbox"
                                        value="{{ $class->id }}" name="category[]" id="category{{ $class->id }}"> {{
                                        $class->name }}
                                    </label>

                                    @endforeach
                                </div>

                            </div>
                        </div>
                        {{-- ! SUBJECT IS DEDECTED IN PRODUCTION --}}
                        <div id="woocommerce_product_categories-2"
                            class="widget p-4d875 border woocommerce widget_product_categories">
                            <div id="subject" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="v1.html#"
                                    data-toggle="collapse" data-target="#subjectCollapse" aria-expanded="true"
                                    aria-controls="widgetCollapseOne">
                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Accessories</h3>

                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>
                            <div id="subjectCollapse" class="mt-3 widget-content collapse show"
                                aria-labelledby="subject" data-parent="#widgetAccordion">
                                <div class="row justify-content-between">
                                    @foreach ($subjects as $subject)
                                    <label class="border border-1 px-2 py-1" style="border-radius:25px;"
                                        for="subject{{ $subject->id }}">
                                        <input {{ in_array($subject->id,request()->products ?? []) ? "checked" : "" }}
                                        type="checkbox"
                                        name="products[]" value="{{ $subject->id }}" id="subject{{ $subject->id }}"> {{
                                        str($subject->name)->headline() }}
                                    </label>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- ! SUBJECT IS DEDECTED IN PRODUCTION --}}
                        <div id="Authors" class="widget widget_search widget_author p-4d875 border">
                            <div id="widgetHeading21" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="v1.html#"
                                    data-toggle="collapse" data-target="#widgetCollapse21" aria-expanded="true"
                                    aria-controls="widgetCollapse21">
                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Author</h3>

                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>
                            <div id="widgetCollapse21" class="mt-4 widget-content collapse show"
                                aria-labelledby="widgetHeading21" data-parent="#widgetAccordion">
                                <div class="row justify-content-between">
                                    @foreach ($authors as $author)
                                    <label class="border border-1 px-2 py-1" style="border-radius:25px;"
                                        for="author{{ $author->id }}">
                                        <input {{ in_array($author->id,request()->authors ?? []) ? "checked" : "" }}
                                        type="checkbox"
                                        name="authors[]" value="{{ $author->id }}" id="author{{ $author->id }}"> {{
                                        str()->headline($author->name) }}
                                    </label>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-dark rounded-0 btn-wide py-3 font-weight-medium w-100">Apply
                            Filter</button>




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
    
    $()

    $('.filterBtn').click(function(e){
        e.preventDefault()
        if($('.sidebarFilter').hasClass('activeFilterSidebar')){

            $('.sidebarFilter').removeClass("activeFilterSidebar")
        } else{
            $('.sidebarFilter').addClass("activeFilterSidebar")
        }
    })
    $('.closeFilterBtn').click(function(e){
        e.preventDefault()
        $('.sidebarFilter').removeClass("activeFilterSidebar")
    })
</script>
@endpush
@endsection