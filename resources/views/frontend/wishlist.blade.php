@extends('layouts.app')

@section('content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Add To Cart</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishlist as $row)
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img style="width:60px;height:60px" src="{{asset('products')}}/{{$row['product']['image']}}" alt="">
                                    </div>
                                   
                                   
                                </td>
                                <td>
                                    <div class="product__cart__item__text">
                                        <h6>{{$row['product']['product_name']}}</h6>
                                       
                                    </div>
                                </td>
                                <td>
                                    <div class="product__cart__item__text">
                                       
                                        <h5>${{$row['product']['price']}}</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <a style="color:black" href="{{route('add.cart',$row->id)}}">Add to Cart</a>
                                    </div>
                                </td>
                               
                                <td class="cart__close"><i class="fa fa-close"></i></td>
                            </tr>
                            @endforeach
                           
                         
                        </tbody>
                    </table>
                </div>
               
            </div>

           
            
        </div>
    </div>
</section>
@endsection