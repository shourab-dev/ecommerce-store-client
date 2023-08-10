@extends('layouts.frontendLayouts')

@section('title')
{{ str($book->title)->headline() }} - {{ env('APP_NAME') }}
@endsection
@section('detail')
{{ $book->short_detail }}
@endsection
@section('frontendContent')
<div id="primary" class="content-area">
    <main id="main" class="site-main ">
        <div class="product">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 woocommerce-product-gallery woocommerce-product-gallery--with-images images">
                        <figure class="woocommerce-product-gallery__wrapper pt-8 mb-0">
                            <div class="js-slick-carousel u-slick"
                                data-pagi-classes="text-center u-slick__pagination my-4">
                                <div class="js-slide">
                                    <img src="{{ $book->thumbnail }}" alt="{{ $book->title }}"
                                        class="mx-auto img-fluid">
                                </div>
                                @foreach ($book->gallery as $gallaryImg)
                                <div class="js-slide">
                                    <img src="{{ $gallaryImg->gall_path }}" alt="{{ $book->title }}"
                                        class="mx-auto img-fluid">
                                </div>

                                @endforeach

                            </div>
                        </figure>
                    </div>
                    <div class="col-md-7 pl-0 summary entry-summary border-left">
                        <div class="space-top-2 px-4 px-xl-7 border-bottom pb-5">
                            <h1 class="product_title entry-title font-size-7 mb-3">{{ $book->title }}</h1>
                            @if(isset($book->author))
                            <div class="font-size-2 mb-4">
                                <span class="font-size-3 font-weight-medium">By {{ str($book->author->name)->headline()
                                    }}</span>
                                <span class="ml-2 text-gray-600">{{ $book->class->name }}</span>
                            </div>
                            @endif
                            <p class="price font-size-22 font-weight-medium mb-3">
                                @if ($book->price !=null)
                                @if ($book->selling_price)
                                <span class="woocommerce-Price-amount amount mr-2"
                                    style="color:#888; text-decoration:line-through;"><span
                                        class="woocommerce-Price-currencySymbol">$</span>{{ $book->price }}</span>
                                <span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-currencySymbol">$</span>{{
                                    $book->selling_price
                                    }}</span>

                                @else
                                <span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-currencySymbol">$</span>{{ $book->price
                                    }}</span>
                                @endif

                                @else
                                <span class="woocommerce-Price-amount amount">Free</span>
                                @endif

                            </p>
                            <div class="mb-2 font-size-2">
                                <span class="font-weight-medium">Short Detail:</span>

                            </div>



                            <div class="woocommerce-product-details__short-description font-size-2 mb-5">
                                <p class>{{ str($book->short_detail) }}</p>
                            </div>


                            <div class="cart d-md-flex align-items-center" method="post" enctype="multipart/form-data">
                                @auth('user')
                                @if($book->isPaid == 1)
                                @if (!$book->is_ebook)
                                <div class="col-lg-4 col-5  d-flex mb-3 mb-lg-0 cartAmountBtns">
                                    <button type="button" data-type="increment"
                                        class="btn btn-outline-dark btn-sm col">+</button>
                                    <input id="cartAmount" type="number" class="form-control col-7 text-center"
                                        value="1" min="1">
                                    <button type="button" data-type="decrement"
                                        class="btn btn-outline-dark btn-sm col">-</button>
                                </div>
                                @endif

                                <a href="{{ route('cart.add',$book->id) }}" name="add-to-cart"
                                    class="btn btn-dark border-0 addToCart rounded-0 p-3 min-width-250 ml-md-4 single_add_to_cart_button button alt">Add
                                    to cart</a>
                                @endif
                                @endauth
                                @guest('user')
                                <a href="{{ route('user.login') }}"
                                    class="btn btn-dark border-0  rounded-0 p-3 min-width-250 ml-md-4 single_add_to_cart_button button alt">Login</a>
                                @endguest
                            </div>
                        </div>

                    </div>
                </div>
            </div>




            <div class="js-scroll-nav mb-10">
                <div class="woocommerce-tabs wc-tabs-wrapper  2 mx-lg-auto">
                    <div id="Description" class>
                        <div class="border-top border-bottom">
                            <ul
                                class="container tabs wc-tabs nav justify-content-md-center flex-nowrap flex-md-wrap overflow-auto overflow-md-visble">
                                @if ($book->detail)
                                <li class="flex-shrink-0 flex-md-shrink-1 nav-item active">
                                    <a class="nav-link py-4 font-weight-medium active" href="#descriptionTab">
                                        Description
                                    </a>
                                </li>
                                @endif
                                @if($book->type == 0)
                                <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                    <a class="nav-link py-4 font-weight-medium" href="#detailTab">
                                        Product Details
                                    </a>
                                </li>
                                @endif

                            </ul>
                        </div>
                        @if ($book->detail)
                        <div class="tab-content font-size-2 container" id="descriptionTab">
                            <div class="row">
                                <div class="col-xl-8 offset-xl-2">
                                    <div
                                        class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab pt-9">

                                        {!! $book->detail !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($book->type == 0)
                        <div class="tab-content font-size-2 container" id="detailTab">
                            <div class="row">
                                <div class="col-xl-8 offset-xl-2">
                                    <div
                                        class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab pt-9">

                                        <div class="table-responsive mb-4">
                                            <table class="table table-hover table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <th class="px-4 px-xl-5">Format: </th>
                                                        <td class>{{ $book->format }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="px-4 px-xl-5">Dimensions</th>
                                                        <td>{{ $book->dimension }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="px-4 px-xl-5">Publication date: </th>
                                                        <td>{{ Carbon\Carbon::parse($book->publication_date)->format("d
                                                            M, Y") }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="px-4 px-xl-5">Publisher:</th>
                                                        <td>{{ str($book->author->name ?? env('APP_NAME'))->headline()
                                                            }}</td>
                                                    </tr>


                                                    <tr>
                                                        <th class="px-4 px-xl-5">Language:</th>
                                                        <td>{{ str($book->lang)->headline() }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>


                </div>
            </div>

            <section class="space-bottom-3">
                <div class="container">
                    <header class="mb-5 d-md-flex justify-content-between align-items-center">
                        <h2 class="font-size-7 mb-3 mb-md-0">Customers Also Considered</h2>
                    </header>
                    <div class="js-slick-carousel products no-gutters border-top border-left border-right"
                        data-arrows-classes="u-slick__arrow u-slick__arrow-centered--y"
                        data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10"
                        data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10"
                        data-slides-show="5" data-responsive="[{
                               &quot;breakpoint&quot;: 1500,
                               &quot;settings&quot;: {
                                 &quot;slidesToShow&quot;: 4
                               }
                            },{
                               &quot;breakpoint&quot;: 1199,
                               &quot;settings&quot;: {
                                 &quot;slidesToShow&quot;: 3
                               }
                            }, {
                               &quot;breakpoint&quot;: 992,
                               &quot;settings&quot;: {
                                 &quot;slidesToShow&quot;: 2
                               }
                            }, {
                               &quot;breakpoint&quot;: 554,
                               &quot;settings&quot;: {
                                 &quot;slidesToShow&quot;: 2
                               }
                            }]">
                        @foreach ($relatedBooks as $relatedBook)


                        <div class="product">
                            <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                <div
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="{{ route('frontend.product.show',$relatedBook->slug) }}"
                                            class="d-block"><img src="{{ $relatedBook->thumbnail }}"
                                                class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                                alt="{{ $relatedBook->tittle }}"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate">
                                            @if(isset($relatedBook->class))
                                            <a href="single-product-v3.html">{{ $relatedBook->class->name }}</a>
                                            @endif


                                        </div>
                                        <h2
                                            class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                            <a href="{{ route('frontend.product.show',$relatedBook->slug) }}">{{
                                                $relatedBook->title }}</a>
                                        </h2>
                                        <div class="font-size-2  mb-1 text-truncate">
                                            @if(isset($relatedBook->author))
                                            <a href="{{ route('frontend.author.all', $relatedBook->author->id) }}"
                                                class="text-gray-700">{{
                                                $relatedBook->author->name }}</a>
                                            @endif

                                        </div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            @if ($relatedBook->price !=null)
                                            @if ($relatedBook->selling_price)
                                            <span class="woocommerce-Price-amount amount mr-2"
                                                style="color:#888; text-decoration:line-through;"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>{{
                                                $relatedBook->price }}</span>
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>{{
                                                $relatedBook->selling_price
                                                }}</span>

                                            @else
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>{{
                                                $relatedBook->price
                                                }}</span>
                                            @endif

                                            @else
                                            <span class="woocommerce-Price-amount amount">Free</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        @auth('user')

                                        @if($relatedBook->isPaid == 1)

                                        <a href="{{ route('cart.add',$relatedBook->id) }}"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto addToCart">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i
                                                    class="flaticon-icon-126515"></i></span>
                                        </a>
                                        @endif
                                        @endauth
                                        @guest('user')
                                        <a href="{{ route('user.login') }}"
                                            class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">Login</span>
                                        </a>
                                        @endguest

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>
        </div>
    </main>
</div>
@push('customJs')
<script>
    $('.cartAmountBtns button').click(function()
        {
            let type = $(this).attr('data-type')
            let value = Number($('#cartAmount').val())
            if(type == 'increment'){
                value += 1
                
            }
            else{
                if(value <= 1){
                    return false;
                }
                value -= 1
            }
            $('#cartAmount').val(value)
        })

</script>
@endpush
@endsection