@extends('users.master')
@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>Shopping order</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <table>
                        <thead>
                            <tr> <th>Stt</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (!empty($datanext[0]->id))
                        @foreach ($datanext as $key => $item)
                            @foreach ($products as  $pro)
                            @if ($pro->id == $item->idProduct)
                                <td> {{$key++ }}</td>
                            
                                <td class="cart__product__item">
                                    <img src="img/shop-cart/cp-1.jpg" alt="">
                                    <div class="cart__product__item__title">
                                        <h6>{{$pro->name}}</h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">${{$pro->price}}</td>
                                <td class="cart__quantity">
                                    <div class="pro-qty">
                                      
                                        <input type="text" value="{{$item->amount}}">
                                       
                                    </div>
                                </td>
                                <td class="cart__total">$ {{$item->amount*$pro->price}}vnĐ</td>
                                
                            </tr>
                            @endif 
                            @endforeach
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="{{ route('home') }}">Continue Shopping</a>
                </div>
            </div>
         
        </div>
       
    </div>
</section>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->

@endsection