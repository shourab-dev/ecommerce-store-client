@extends('layouts.frontendLayouts')
@section('frontendContent')
{{-- *BANNER --}}
<section id="banner" class="space-bottom-3">
    <div class="bg-gray-200 space-2 space-lg-0 bg-img-hero">
        <div class="container">
            <div class="js-slick-carousel u-slick"
                data-pagi-classes="text-center u-slick__pagination position-absolute right-0 left-0 mb-n8 mb-lg-4 bottom-0">
                @foreach ($featuredBooks as $banner)

                <div class="js-slide">
                    <div class="hero row min-height-588 align-items-center">
                        <div class="col-lg-7 col-wd-6 mb-4 mb-lg-0 order-2 order-md-1">
                            <div class="media-body mr-wd-4 align-self-center mb-4 mb-md-0">
                                <p class="hero__pretitle text-uppercase font-weight-bold text-gray-400 mb-2"
                                    data-scs-animation-in="fadeInUp" data-scs-animation-delay="200">{{
                                    $banner->class->name }}</p>
                                <h2 class="hero__title font-size-14 mb-4" data-scs-animation-in="fadeInUp"
                                    data-scs-animation-delay="300">
                                    <span class="hero__title-line-1 font-weight-regular d-block">{{ $banner->title
                                        }}</span>
                                    <span class="hero__title-line-2 font-weight-bold d-block">{{
                                        Carbon\Carbon::parse($banner->created_at)->format("F") }}</span>
                                </h2>
                                <a target="_blank" href="{{ route('frontend.product.show',$banner->slug) }}"
                                    class="btn btn-dark btn-wide rounded-0 hero__btn" data-scs-animation-in="fadeInLeft"
                                    data-scs-animation-delay="400">See More</a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-wd-6 order-1 order-md-2" data-scs-animation-in="fadeInRight"
                            data-scs-animation-delay="500">
                            <img class="img-fluid mx-auto" src="{{ $banner->thumbnail }}" alt="image-description">
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
{{-- *BANNER ENDS--}}

`

{{-- * BEST SELLING --}}
@if (count($mostSellingBooks) > 2)
    

<section class="space-bottom-3">
    <div class="container">
        <header class="mb-5 d-md-flex justify-content-between align-items-center">
            <h2 class="font-size-7 mb-3 mb-md-0">Bestselling Books</h2>
            <a href="{{ route('frontend.product.show') }}" class="h-primary d-block">View All <i
                    class="glyph-icon flaticon-next"></i></a>
        </header>
        <div class="js-slick-carousel products no-gutters border-top border-left border-right"
            data-pagi-classes="d-xl-none text-center position-absolute right-0 left-0 u-slick__pagination mt-4 mb-0"
            data-arrows-classes="d-none d-xl-block u-slick__arrow u-slick__arrow-centered--y"
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
                },{
                   &quot;breakpoint&quot;: 992,
                   &quot;settings&quot;: {
                     &quot;slidesToShow&quot;: 2
                   }
                }, {
                   &quot;breakpoint&quot;: 768,
                   &quot;settings&quot;: {
                     &quot;slidesToShow&quot;: 2
                   }
                }, {
                   &quot;breakpoint&quot;: 554,
                   &quot;settings&quot;: {
                     &quot;slidesToShow&quot;: 2
                   }
                }]">

            @forelse ($mostSellingBooks as $mostSellingBook)

            <div class="product">
                <div class="product__inner overflow-hidden p-3 p-md-4d875">
                    <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                        <div class="woocommerce-loop-product__thumbnail">
                            <a href="{{ route('frontend.product.show', $mostSellingBook->slug) }}" class="d-block">
                                <img src="{{ $mostSellingBook->thumbnail }}"
                                    class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                    alt="image-description">
                            </a>
                        </div>
                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                            <div class="text-uppercase font-size-1 mb-1 text-truncate">
                                <a href="#">{{ $mostSellingBook->class->name }}</a>

                            </div>
                            <h2
                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                <a href="{{ route('frontend.product.show', $mostSellingBook->slug) }}">{{
                                    $mostSellingBook->title }}</a>
                            </h2>
                            <div class="font-size-2  mb-1 text-truncate"><a
                                    href="/books?authors%5B%5D={{$mostSellingBook->user_id}}"
                                    class="text-gray-700">{{ $mostSellingBook->author->name }}</a></div>
                            <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                @if ($mostSellingBook->selling_price)
                                <span class="woocommerce-Price-amount amount mr-2"
                                    style="text-decoration: line-through;color: #888;"><span
                                        class="woocommerce-Price-currencySymbol">$</span>{{ $mostSellingBook->price
                                    }}</span>
                                <span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-currencySymbol">$</span>{{
                                    $mostSellingBook->selling_price }}</span>
                                @else
                                <span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-currencySymbol">$</span>{{ $mostSellingBook->price
                                    }}</span>
                                @endif


                            </div>
                        </div>
                        <div class="product__hover d-flex align-items-center">
                            @guest('user')
                            <a href="{{ route('user.login') }}" target="__blank"
                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto Login"
                                data-toggle="tooltip" data-placement="right" title="Login">
                                <span class="product__add-to-cart">Login</span>
                                <span class="product__add-to-cart-icon font-size-3"><i
                                        class="glph-icon flaticon-user mr-2"></i> Login</span>
                            </a>

                            @endguest
                            @auth('user')

                            <a href="{{ route('cart.add', $mostSellingBook->id) }}"
                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto addToCart">
                                <span class="product__add-to-cart">ADD TO CART</span>
                                <span class="product__add-to-cart-icon font-size-4"><i
                                        class="flaticon-icon-126515"></i></span>
                            </a>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
            @empty
            <h4 class="mt-5">No Best Selling Books</h4>
            @endforelse

        </div>
    </div>
</section>
@endif
{{-- * BEST SELLING ENDS --}}

{{-- * FEATURED BOOKS AND ON SALE BOOKS --}}
<section class="space-bottom-3">
    <header class="mb-4 container">
        <h2 class="font-size-7 text-center">Featured Books</h2>
    </header>
    <div class="container">
        <ul class="nav justify-content-center nav-gray-700 mb-5 flex-nowrap flex-md-wrap overflow-auto overflow-md-visible"
            id="featuredBooks" role="tablist">
            <li class="nav-item mx-5 mb-1 flex-shrink-0 flex-md-shrink-1">
                <a class="nav-link px-0 active" id="featured-tab" data-toggle="tab" data-target="#featured"
                    href="index.html#featured" role="tab" aria-controls="featured" aria-selected="true">Featured</a>
            </li>
            <li class="nav-item mx-5 mb-1 flex-shrink-0 flex-md-shrink-1">
                <a class="nav-link px-0" id="onsale-tab" data-toggle="tab" data-target="#onsale"
                    href="index.html#onsale" role="tab" aria-controls="onsale" aria-selected="false">On Sale</a>
            </li>

        </ul>
        <div class="tab-content" id="featuredBooksContent">
            {{-- * FEATURED PRODUCTS --}}
            <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                <ul
                    class="products list-unstyled row no-gutters row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-wd-6 border-top border-left my-0">
                    @forelse ($featuredBooks as $featureBook)
                    <li class="product col">
                        <div class="product__inner overflow-hidden p-3 p-md-4d875">
                            <div
                                class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                <div class="woocommerce-loop-product__thumbnail">
                                    <a href="{{ route('frontend.product.show', $featureBook->slug) }}"
                                        class="d-block"><img src="{{ $featureBook->thumbnail }}"
                                            class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                                            alt="image-description"></a>
                                </div>
                                <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                    <div class="text-uppercase font-size-1 mb-1 text-truncate">
                                        <a class="mr-2" href="#">{{
                                            $featureBook->class->name }}</a>



                                    </div>
                                    <h2
                                        class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                        <a href="{{ route('frontend.product.show', $featureBook->slug) }}">{{
                                            $featureBook->title }}</a>
                                    </h2>
                                    <div class="font-size-2  mb-1 text-truncate"><a
                                            href="/books?authors%5B%5D={{$featureBook->user_id}}"
                                            class="text-gray-700">{{
                                            str($featureBook->author->name)->headline() }}</a></div>
                                    <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                        @if ($featureBook->price != null)
                                        @if ($featureBook->selling_price)
                                        <span class="woocommerce-Price-amount amount mr-2"
                                            style="text-decoration: line-through;color: #888;"><span
                                                class="woocommerce-Price-currencySymbol">$</span>{{ $featureBook->price
                                            }}</span>
                                        <span class="woocommerce-Price-amount amount"><span
                                                class="woocommerce-Price-currencySymbol">$</span>{{
                                            $featureBook->selling_price }}</span>
                                        @else
                                        <span class="woocommerce-Price-amount amount"><span
                                                class="woocommerce-Price-currencySymbol">$</span>{{ $featureBook->price
                                            }}</span>
                                        @endif
                                        @else
                                        <span class="woocommerce-Price-amount amount">Free</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="product__hover d-flex align-items-center">



                                    @auth('user')
                                    <a href="{{ route('cart.add', $featureBook->id) }}"
                                        class="text-uppercase text-dark h-dark font-weight-medium mr-auto addToCart"
                                        data-toggle="tooltip" data-placement="right" title="ADD TO CART">
                                        <span class="product__add-to-cart">ADD TO CART</span>
                                        <span class="product__add-to-cart-icon font-size-4"><i
                                                class="flaticon-icon-126515"></i></span>
                                    </a>
                                    @endauth
                                    @guest('user')
                                    <a href="{{ route('user.login') }}" target="__blank"
                                        class="text-uppercase text-dark h-dark font-weight-medium mr-auto Login"
                                        data-toggle="tooltip" data-placement="right" title="Login">
                                        <span class="product__add-to-cart">Login</span>
                                        <span class="product__add-to-cart-icon font-size-3"><i
                                                class="glph-icon flaticon-user mr-2"></i> Login</span>
                                    </a>

                                    @endguest

                                </div>
                            </div>
                        </div>
                    </li>
                    @empty
                    <li class="col-lg-12 col-12 text-center">
                        <h4 class="mt-3 d-lg-block d-none">No Featured Product Found !</h4>
                        <h6 class="mt-3 d-lg-none">No Featured Product Found !</h6>
                    </li>
                    @endforelse


                </ul>
            </div>
            {{-- * FEATURED PRODUCTS END--}}
            {{-- *ON SALE --}}
            <div class="tab-pane fade" id="onsale" role="tabpanel" aria-labelledby="onsale-tab">
                <ul
                    class="products list-unstyled row no-gutters row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-wd-6 border-top border-left my-0">


                </ul>
            </div>
            {{-- *ON SALE END--}}
        </div>
    </div>
</section>
{{-- * FEATURED BOOKS AND ON SALE BOOKS ENDS --}}

{{-- * Book Shop --}}
<section class="space-bottom-3">
    <div class="container">
        <header class="mb-5 d-md-flex justify-content-between align-items-center">
            <h2 class="font-size-7  mb-3 mb-md-0">Books Shops</h2>
            <a href="{{ route('frontend.product.show') }}" class="h-primary d-block">View All <i
                    class="glyph-icon flaticon-next"></i></a>
        </header>
        <div class="js-slick-carousel u-slick products border"
            data-pagi-classes="text-center u-slick__pagination mt-md-8 mt-4 position-absolute right-0 left-0"
            data-slides-show="3" data-responsive="[{
                   &quot;breakpoint&quot;: 992,
                   &quot;settings&quot;: {
                     &quot;slidesToShow&quot;: 2
                   }
                }, {
                   &quot;breakpoint&quot;: 768,
                   &quot;settings&quot;: {
                     &quot;slidesToShow&quot;: 1
                   }
                }, {
                   &quot;breakpoint&quot;: 554,
                   &quot;settings&quot;: {
                     &quot;slidesToShow&quot;: 1
                   }
                }]">
            @foreach ($newBooks as $newBook)
            <div class="product product__card border-right">
                <div class="media p-3 p-md-4d875">
                    <a href="{{ route('frontend.product.show', $newBook->slug) }}" class="d-block"><img
                            src="{{ $newBook->thumbnail }}" width="120px" alt="image-description"></a>
                    <div class="media-body ml-4d875">
                        <div class="text-uppercase font-size-1 mb-1 text-truncate">
                            <a class="mr-2" href="#">{{ $newBook->class->name ?? '' }}</a>

                        </div>
                        <h2 class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                            <a href="{{ route('frontend.product.show', $newBook->slug) }}">{{ $newBook->title }}</a>
                        </h2>
                        <div class="font-size-2 mb-1 text-truncate">
                            @if (isset($newBook->author->id))

                            <a href="/books?authors%5B%5D={{$newBook->user_id}}" class="text-gray-700">{{
                                $newBook->author->name }}</a>
                        </div>
                        @endif
                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                            @if ($newBook->price !=null)
                            @if ($newBook->selling_price)
                            <span class="woocommerce-Price-amount amount mr-2"
                                style="color:#888; text-decoration:line-through;"><span
                                    class="woocommerce-Price-currencySymbol">$</span>{{ $newBook->price }}</span>
                            <span class="woocommerce-Price-amount amount"><span
                                    class="woocommerce-Price-currencySymbol">$</span>{{ $newBook->selling_price
                                }}</span>

                            @else
                            <span class="woocommerce-Price-amount amount"><span
                                    class="woocommerce-Price-currencySymbol">$</span>{{ $newBook->price }}</span>
                            @endif

                            @else
                            <span class="woocommerce-Price-amount amount">Free</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
{{-- * Book Shop ENDs--}}

{{-- * ALL AUTHORS --}}
@if (count($authors) > 0)
<section class="space-bottom-3">
    <div class="container">
        <header class="d-md-flex justify-content-between align-items-center mb-8">
            <h2 class="font-size-7 mb-3 mb-md-0">Favorite Authors</h2>
            <a href="{{ route('frontend.product.show') }}" class="h-primary d-block">View All <i
                    class="glyph-icon flaticon-next"></i></a>
        </header>
        <ul id="authorSlider" class="row rows-cols-5 no-gutters authors list-unstyled js-slick-carousel u-slick"
            data-slides-show="5" data-arrows-classes="u-slick__arrow u-slick__arrow-centered--y"
            data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10"
            data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10"
            data-responsive="[{
                    &quot;breakpoint&quot;: 1025,
                    &quot;settings&quot;: {
                        &quot;slidesToShow&quot;: 3
                    }
                }, {
                    &quot;breakpoint&quot;: 992,
                    &quot;settings&quot;: {
                        &quot;slidesToShow&quot;: 2
                    }
                }, {
                    &quot;breakpoint&quot;: 768,
                    &quot;settings&quot;: {
                        &quot;slidesToShow&quot;: 1
                    }
                }, {
                    &quot;breakpoint&quot;: 554,
                    &quot;settings&quot;: {
                        &quot;slidesToShow&quot;: 1
                    }
                }]">
            @foreach ($authors as $author)
            <li class="author col">
                <a href="books?authors%5B%5D={{ $author->id }}" class="text-reset">
                    <img width="80" src="https://api.dicebear.com/6.x/initials/svg?seed={{ $author->name }}"
                        class="mx-auto mb-5 d-block rounded-circle" alt="image-description">
                    <div class="author__body text-center">
                        <h2 class="author__name h6 mb-0">{{ str($author->name)->slug() }}</h2>
                        <div class="text-gray-700 font-size-2">{{ $author->numOfBooks }} Published Books</div>
                    </div>
                </a>
            </li>
            



            @endforeach

        </ul>
    </div>
</section>
@endif
{{-- * ALL AUTHORS ENS --}}

@push('customJs')
<script>
    let isClickedOnSale = false;
    let onsale = $('#onsale ul')
    $('#onsale-tab').click(function(){
       if(isClickedOnSale != true){
        $.ajax({
        method:'GET',
        url: '{{ route('frontend.onSale') }}',
        success: function(res) {
        let discountedBooks = JSON.parse(res)
        let listOfBooks = []
        console.log(discountedBooks[0].class.name);
        discountedBooks.map(discountBook=> {
        let url = '{{ route("cart.add", ":id") }}'
        url = url.replace(':id', discountBook.id)
        
        let displayUrl = `{{ route('frontend.product.show',':slug') }}`
        displayUrl = displayUrl.replace(':slug', discountBook.slug)

        let authorUrl = `/books?authors%5B%5D=:authorId`
        authorUrl = authorUrl.replace(':authorId', discountBook.author.id)


    let li = `<li class="product col">
    <div class="product__inner overflow-hidden p-3 p-md-4d875">
        <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
            <div class="woocommerce-loop-product__thumbnail">
                <a href="${displayUrl}" class="d-block"><img src="${discountBook.thumbnail}"
                        class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                        alt="${discountBook.title}"></a>
            </div>
            <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                <div class="text-uppercase font-size-1 mb-1 text-truncate"><a
                        href="#">${discountBook.class.name}</a>
                <h2
                    class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                    <a href="${displayUrl}">${discountBook.title}</a>
                </h2>
                <div class="font-size-2  mb-1 text-truncate"><a
                        href="${authorUrl}"
                        class="text-gray-700">${discountBook.author.name}</a></div>
                <div class="price d-flex align-items-center font-weight-medium font-size-3">
                   
                    <span class="woocommerce-Price-amount amount mr-2" style="text-decoration:line-through;"><span
                            class="woocommerce-Price-currencySymbol">$</span>${discountBook.price}</span>
                    <span class="woocommerce-Price-amount amount"><span
                            class="woocommerce-Price-currencySymbol">$</span>${discountBook.selling_price}</span>
                </div>
            </div>
            <div class="product__hover d-flex align-items-center">
                @auth('user')
                <a href="${url}" target="__blank"
                    class="text-uppercase text-dark h-dark font-weight-medium mr-auto addToCart" data-toggle="tooltip"
                    data-placement="right" title="ADD TO CART" >
                    <span class="product__add-to-cart">ADD TO CART</span>
                    <span class="product__add-to-cart-icon font-size-3"><i class="flaticon-icon-126515 mr-2"></i> Add To Cart</span>
                </a>
                @endauth
                @guest('user')
                 <a href="{{ route('user.login') }}" target="__blank" class="text-uppercase text-dark h-dark font-weight-medium mr-auto Login"
                    data-toggle="tooltip" data-placement="right" title="Login">
                    <span class="product__add-to-cart">Login</span>
                    <span class="product__add-to-cart-icon font-size-3"><i class="glph-icon flaticon-user mr-2"></i> Login</span>
                </a>
                   
                @endguest
                
              </div>
            </div>
        </div>
    </li>`

    listOfBooks.push(li)

    })

        onsale.html(listOfBooks)


        }
        });
        }
        
       
       
    })
</script>
@endpush

@endsection