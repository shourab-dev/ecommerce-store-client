@extends('layouts.frontendLayouts')
@section('frontendContent')
<div class="site-content bg-light overflow-hidden" id="content">
    <div class="container">
        <header class="entry-header space-top-2 space-bottom-1 mb-2">
            <h1 class="entry-title font-size-7">Your cart: {{ count($data['carts']) }} items</h1>
        </header>
        <div class="row pb-8">
            <div id="secondary" class="sidebar col-lg-6 cart-collaterals" role="complementary">
                <div id="cartAccordion" class="border border-gray-500 bg-white mb-5">
                    <form action="{{ route('checkout') }}" method="POST" class="p-4">
                        <h5 class="mb-4">Check Out Form</h5>
                        @csrf
                        <input type="text" class="form-control my-2" value="{{ auth()->guard('user')->user()->name }}" name="name" placeholder="User Name">
                        @error('name')
                        <span class="text-danger my-2 d-block">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control my-2" name="email" value="{{ auth()->guard('user')->user()->email }}" placeholder="Email">
                        @error('email')
                        <span class="text-danger my-2 d-block">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control my-2" name="phone" placeholder="Phone">
                        @error('phone')
                        <span class="text-danger my-2 d-block">{{ $message }}</span>
                        @enderror
                        <input type="number" class="form-control my-2" name="postCode" placeholder="Post Code">
                        @error('postCode')
                        <span class="text-danger my-2 d-block">{{ $message }}</span>
                        @enderror
                        <textarea name="address" class="form-control my-2" placeholder="Your Address"></textarea>
                        @error('address')
                            <span class="text-danger my-2 d-block">{{ $message }}</span>
                        @enderror
                    
                    <div class="p-4d875 border">
                        <table class="shop_table shop_table_responsive">
                            <tbody>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">tk </span>{{
                                                $data['totalPrice']
                                                }}</span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="wc-proceed-to-checkout">
                    <button type="submit"
                        class="checkout-button button alt wc-forward btn btn-dark btn-block rounded-0 py-4">Proceed
                        to checkout</button>
                </div>
                </form>
            </div>
            <div id="primary" class="content-area col-lg-6">
                <main id="main" class="site-main ">
                    <div class="page type-page status-publish hentry">

                        <div class="entry-content">
                            <div class="woocommerce">
                                <form class="woocommerce-cart-form table-responsive" action="cart.html#" method="post">
                                    <table
                                        class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-remove">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($data['carts'] as $cart)

                                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                                <td class="product-name" data-title="Product">
                                                    <div class="d-flex align-items-center">
                                                        <a href="cart.html#">
                                                            <img src="../../assets/img/90x138/img1.jpg"
                                                                class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                                alt>
                                                        </a>
                                                        <div class="ml-3 m-w-200-lg-down">
                                                            <a href="cart.html#">{{ $cart->books->title }}</a>
                                                            <a href="cart.html#"
                                                                class="text-gray-700 font-size-2 d-block"
                                                                tabindex="0">{{ $cart->books->author->name }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product-price" data-title="Price">
                                                    <span class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">tk</span> {{
                                                        $cart->books->selling_price ?? $cart->books->price }}</span>
                                                </td>


                                                <td class="product-remove">
                                                    <a href="{{ route('cart.remove', $cart->id) }}" class="remove"
                                                        aria-label="Remove this item">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="15px"
                                                            height="15px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                                                d="M15.011,13.899 L13.899,15.012 L7.500,8.613 L1.101,15.012 L-0.012,13.899 L6.387,7.500 L-0.012,1.101 L1.101,-0.012 L7.500,6.387 L13.899,-0.012 L15.011,1.101 L8.613,7.500 L15.011,13.899 Z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach

                                            <tr>
                                                <td colspan="5" class="actions">
                                                    <a href="{{ route('cart.all.items') }}" class="btn btn-dark">Update
                                                        Cart</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>

                    </div>
                </main>
            </div>

        </div>
    </div>
</div>
@endsection