@extends('layouts.app')

@section('content')

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Best Sellers</li>
                    <li data-filter=".new-arrivals">New Arrivals</li>
                    <li data-filter=".hot-sales">Hot Sales</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
          
            @foreach ($product as $item)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
               
                    
               
                <div class="product__item">
                   
                    <div class="product__item__pic set-bg" data-setbg="{{asset('products')}}/{{$item->image}}">
                        <ul class="product__hover">
                            <li><a href="#"><img src="{{asset('frontend/img/icon/heart.png')}}" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('frontend/img/icon/compare.png')}}" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="{{asset('frontend/img/icon/search.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$item->product_name}}</h6>
                        <a href="/product-details/{{$item->id}}" class="add-cart">+ Add To Cart</a>
                        {{-- <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div> --}}
                        <h5>${{$item->price}}</h5>

                        <div class="product__color__select">
                            <label for="pc-4">
                                <input type="radio" id="pc-4">
                            </label>
                            <label class="active black" for="pc-5">
                                <input type="radio" id="pc-5">
                            </label>
                            <label class="grey" for="pc-6">
                                <input type="radio" id="pc-6">
                            </label>
                        </div>
                    </div>
                   
                </div>
               

            </div>
            @endforeach
            @foreach ($new_product as $item)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div class="product__item sale">
                    <div class="product__item__pic set-bg" data-setbg="{{asset('products')}}/{{$item->image}}">
                        <span class="label">Sale</span>
                        <ul class="product__hover">
                            <li><a href="#"><img src="{{asset('frontend/img/icon/heart.png')}}" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('frontend/img/icon/compare.png')}}" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="{{asset('frontend/img/icon/search.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$item->product_name}}</h6>
                        <a href="/product-details/{{$item->id}}"  class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>$43.48</h5>
                        <div class="product__color__select">
                            <label for="pc-7">
                                <input type="radio" id="pc-7">
                            </label>
                            <label class="active black" for="pc-8">
                                <input type="radio" id="pc-8">
                            </label>
                            <label class="grey" for="pc-9">
                                <input type="radio" id="pc-9">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
          
          
          
          
          
        </div>
    </div>
</section>


@endsection