@extends('layouts.app')

@section('content')
<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Product Details</span>
                    </div>
                </div>
            </div>
            <div class="row">
               
                    
              
                <div class="col-lg-3 col-md-3">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="{{asset('products')}}/{{$product->image}}">
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="{{asset('products')}}/{{$product->image}}">
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="{{asset('products')}}/{{$product->image}}">
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="{{asset('products')}}/{{$product->image}}" alt="">
                            </div>
                        </div>
                       
                       
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>


    


    <div class="product__details__content">

        @if(session('message'))
        <div class="alert alert-info" role="alert">
        {{session('message')}}
        </div>
        @endif

        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <h4>Hooded thermal anorak</h4>
                        {{-- <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span> - 5 Reviews</span>
                        </div> --}}
                        <h3>${{$product->price}} <span>70.00</span></h3>
                        <p>{{$product->description}}</p>
                        <div class="product__details__option">
                            <div class="product__details__option__size">
                                <span>Size:</span>
                                <label for="xxl">{{$size->size}}
                                    <input type="radio" id="xxl">
                                </label>
                                
                            </div>
                            <div class="product__details__option__color">
                                <span>Color:</span>
                                <label class="c-1" for="sp-1">
                                    <input type="radio" id="sp-1">
                                </label>
                               
                            </div>
                        </div>
                        <form method="POST" action="{{URL::to('/cart/product/'.$product->id)}}">
                            @csrf
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="product_quantity" value="1">
                                        <input class="input-number" type="hidden" name="id" value="{{$product->id}}">
                                    </div>
                                </div>
                                <button type="submit" class="primary-btn">add to cart</button>
                            </div>
                        </form>
                        <div class="product__details__btns__option">
                            <a href="{{route('wishlist',$product->id)}}"><i class="fa fa-heart"></i> add to wishlist</a>
                            <a href="#"><i class="fa fa-exchange"></i> Add To Compare</a>
                        </div>
                      
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</section>
@endsection