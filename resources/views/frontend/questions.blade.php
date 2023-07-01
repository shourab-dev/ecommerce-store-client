@extends('layouts.frontendLayouts')
@section('frontendContent')


<div class="site-content space-bottom-3 pt-4" id="content">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area col-lg-8 order-lg-2">
                <div
                    class="shop-control-bar d-lg-flex justify-content-between align-items-center mb-5 text-center text-md-left">
                    <div class="shop-control-bar__left mb-4 m-lg-0">
                        <p class="woocommerce-result-count m-0">Showing {{ $questions->firstItem() }}-{{
                            $questions->lastItem() }} of {{ $questions->total() }} results</p>
                    </div>
              
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-one-example1" role="tabpanel"
                        aria-labelledby="pills-one-example1-tab">

                        <ul
                            class="products list-unstyled row no-gutters row-cols-2 row-cols-lg-2 row-cols-wd-2 border-top border-left mb-6">
                            @foreach ($questions as $question)
                            <li class="product col">
                                <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                    <div
                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                     
                                        <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                            <div class="text-uppercase font-size-1 mb-1 text-truncate">
                                                <a href="#">{{
                                                    $question->classRoom->name }}</a>
                                                <a href="#">{{
                                                    $question->subject->name }}</a>
                                            </div>
                                            <h2
                                                class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark">
                                                <a href="{{ route('frontend.questions.single' ,$question->slug) }}">{{
                                                    str($question->question_name)->headline() }}</a>
                                            </h2>
                                            <p>
                                                Published Date  {{  Carbon\Carbon::parse($question->date)->format('d (D) - M - Y') }}
                                            </p>
                                           
                                           
                                        </div>
                                        <div class="product__hover d-flex align-items-center">
                                       
                                          
                                            <a href="{{ route('frontend.questions.single' ,$question->slug) }}"
                                                class="text-uppercase text-dark h-dark font-weight-medium mr-auto"
                                                target="__blank" data-original-title="Login">
                                                <span class="product__add-to-cart">View Question</span>
                                                <span class="product__add-to-cart-icon font-size-4"><i
                                                        class="flaticon-icon-126515"></i></span>
                                            </a>
                                       

                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>

                    </div>

                </div>

                {{ $questions->onEachSide(1)->appends(request()->query())->links() }}

            </div>
           <div id="secondary" class="sidebar widget-area col-lg-4 order-1" role="complementary">
                <form action="{{ request()->getRequestUri() }}" method="get">
            
            
                    <div id="widgetAccordion">
                        <div id="woocommerce_product_categories-2"
                            class="widget p-4d875 border woocommerce widget_product_categories">
                            <div class="questionSearchArea">
                                <input type="search" name="question" class="form-control mb-4" placeholder="Search Question Name Here...">
                            </div>
                            <div id="widgetHeadingOne" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="v1.html#"
                                    data-toggle="collapse" data-target="#widgetCollapseOne" aria-expanded="true"
                                    aria-controls="widgetCollapseOne">
                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Categories </h3>
                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="15px" height="2px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                    </svg>
                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>
                            <div id="widgetCollapseOne" class="mt-3 widget-content collapse show" aria-labelledby="widgetHeadingOne"
                                data-parent="#widgetAccordion">
                                <div class="row justify-content-between">
                                    @foreach ($classRooms as $class)
                                    <label class="border border-1 px-2 py-1" style="border-radius:25px;"
                                        for="category{{ $class->id }}">
                                        <input type="checkbox" value="{{ $class->id }}" name="class[]"
                                            id="category{{ $class->id }}"> {{ $class->name }}
                                    </label>
            
                                    @endforeach
                                </div>
            
                            </div>
                        </div>
                        <div id="woocommerce_product_categories-2"
                            class="widget p-4d875 border woocommerce widget_product_categories">
                            <div id="subject" class="widget-head">
                                <a class="d-flex align-items-center justify-content-between text-dark" href="v1.html#"
                                    data-toggle="collapse" data-target="#subjectCollapse" aria-expanded="true"
                                    aria-controls="widgetCollapseOne">
                                    <h3 class="widget-title mb-0 font-weight-medium font-size-3">Subject</h3>
                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="15px" height="2px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                    </svg>
                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="15px" height="15px">
                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                            d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                    </svg>
                                </a>
                            </div>
                            <div id="subjectCollapse" class="mt-3 widget-content collapse show" aria-labelledby="subject"
                                data-parent="#widgetAccordion">
                                <div class="row justify-content-between">
                                    @foreach ($subjects as $subject)
                                    <label class="border border-1 px-2 py-1" style="border-radius:25px;"
                                        for="subject{{ $subject->id }}">
                                        <input type="checkbox" name="subjects[]" value="{{ $subject->id }}"
                                            id="subject{{ $subject->id }}"> {{ $subject->name }}
                                    </label>
            
                                    @endforeach
                                </div>
                            </div>
                            
                        </div>
                        <div class="widget p-4d875 border woocommerce widget_product_categories">

                        
                        <div class="dates">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fromDate">From</label>
                                    <input type="date" name="from" id="fromDate" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="toDate">To</label>
                                    <input type="date" name="to" id="toDate" class="form-control">
                                </div>
                            </div>
                        </div>
                        </div>
                        

                        <button class="btn btn-dark rounded-0 btn-wide py-3 font-weight-medium w-100">Apply Filter</button>
            
            
            
            
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection