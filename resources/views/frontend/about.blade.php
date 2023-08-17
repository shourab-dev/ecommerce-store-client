@extends('layouts.frontendLayouts')

@section('frontendContent')
   <div class="mb-5 space-bottom-lg-3">
        <div class="py-3 py-lg-7">
            <h6 class="font-weight-medium font-size-7 text-center my-1">About Us</h6>
        </div>
        <img class="aboutFeatured" src="{{ $about->featured }}" alt="{{ env('APP_NAME') }} About">
        <div class="container">
            <div class="mb-lg-8">
                <div class="col-lg-9 mx-auto">
                    <div class="bg-white mt-n10 mt-md-n13 pt-5 pt-lg-7 px-3 px-md-5 pl-xl-10 pr-xl-4">
                        <div class="mb-4 mb-lg-7 ml-xl-4">
                            <h6 class="font-weight medium font-size-10 mb-4 mb-lg-7">{{ $about->title }}</h6>
                        </div>
                        <div class="mb-4 pb-xl-1 ml-xl-4">
                          {!! $about->detail !!}
                        </div>
                        {{-- <div class="ml-xl-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="font-weight-medium font-size-4">Our Vision</h6>
                                    <p class="font-size-2">Pellentesque sodales augue eget ultricies ultricies. Cum
                                        sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                                        mus. Curabitur sagittis ultrices condimentum.</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="font-weight-medium font-size-4">Our Vision</h6>
                                    <p class="font-size-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Etiam quis diam erat. Duis velit lectus, posuere a blandit metus mauris,
                                        tristique quis sapien eu, rutrum vulputate enim.</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
         
            <div class="mb-5 mb-lg-10">
                <h6 class="font-weight-medium font-size-7 mb-5 mb-lg-6">Why Us</h6>
                <ul class="list-unstyled my-0 list-features row d-md-flex">
                    <li class="list-feature mb-5 mb-lg-0 col-md-6 col-lg-3">
                        <div class="media flex-column align-items-center align-items-md-start pr-xl-3">
                            <div class="feature__icon font-size-14 text-primary text-lh-xs mb-3">
                                <i class="glyph-icon flaticon-delivery"></i>
                            </div>
                            <div class="media-body text-center text-md-left">
                                <h4 class="feature__title font-size-3 text-dark">Free Delivery</h4>
                                <p class="feature__subtitle m-0 text-dark">Enjoy the convenience of free and swift delivery on all your orders, ensuring your purchases reach your doorstep without
                                any extra cost.</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-feature  mb-5 mb-lg-0 col-md-6 col-lg-3">
                        <div class="media flex-column align-items-center align-items-md-start pr-xl-3">
                            <div class="feature__icon font-size-14 text-primary text-lh-xs mb-3">
                                <i class="glyph-icon flaticon-credit"></i>
                            </div>
                            <div class="media-body text-center text-md-left">
                                <h4 class="feature__title font-size-3 text-dark">Secure Payment</h4>
                                <p class="feature__subtitle m-0 text-dark">Your data is safe with us. Advanced encryption ensures your transactions are protected, offering worry-free shopping.</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-feature  mb-5 mb-md-0 col-md-6 col-lg-3">
                        <div class="media flex-column align-items-center align-items-md-start pr-xl-3">
                            <div class="feature__icon font-size-14 text-primary text-lh-xs mb-3">
                                <i class="glyph-icon flaticon-warranty"></i>
                            </div>
                            <div class="media-body text-center text-md-left">
                                <h4 class="feature__title font-size-3 text-dark">Money Back Guarantee</h4>
                                <p class="feature__subtitle m-0 text-dark">Shop risk-free. Unsatisfied? We've got you covered. Our no-hassle money-back guarantee ensures your satisfaction.</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-feature  mb-5 mb-md-0 col-md-6 col-lg-3">
                        <div class="media flex-column align-items-center align-items-md-start pr-xl-3">
                            <div class="feature__icon font-size-14 text-primary text-lh-xs mb-3">
                                <i class="glyph-icon flaticon-help"></i>
                            </div>
                            <div class="media-body text-center text-md-left">
                                <h4 class="feature__title font-size-3 text-dark">24/7 Support</h4>
                                <p class="feature__subtitle m-0 text-dark">Need assistance anytime? Count on us. Our dedicated support team is available round-the-clock for seamless shopping
                                help.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
           
          
        </div>
    </div>
@endsection






       
  

