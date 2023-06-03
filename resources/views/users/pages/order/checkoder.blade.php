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
                    <h3 class="">Sản phẩm đã đặt</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts3 as $key => $cart)
                            @foreach ($cart as  $pro)
                            <tr>
                                <td>{{$key++ }}</td>
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
                                        <input type="text" value="{{$pro->amount}}" class="form-control">
                                    </div>
                                </td>
                                <td class="cart__total">$ {{$pro->amount*$pro->price}}vnĐ</td>
                            </tr>
                            @endforeach
                            @endforeach
                            @if (count($carts3) == 0)
        <tr>
            <td colspan="5">No items found.</td>
        </tr>
    @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <h3 class="">Sản phẩm Đang Chờ Xử Lý</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts1 as $key => $cart)
                            @foreach ($cart as  $pro)
                            <tr>
                                <td>{{$key++ }}</td>
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
                                        <input type="text" value="{{$pro->amount}}" class="form-control">
                                    </div>
                                </td>
                                <td class="cart__total">$ {{$pro->amount*$pro->price}}vnĐ</td>
                                
                            </tr>
                            @endforeach
                            @endforeach
                            @if (count($carts1) == 0)
        <tr>
            <td colspan="5">No items found.</td>
        </tr>
    @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            <div class="shop__cart__table">
                    <h3 class="">Sản phẩm Đang Giao</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                               
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($carts2 as $key => $cart)
                            @foreach ($cart as  $pro)
                            <tr>
                                <td>{{$key++ }}</td>
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
                                        <input type="text" value="{{$pro->amount}}" class="form-control">
                                    </div>
                                </td>
                                <td class="cart__total">$ {{$pro->amount*$pro->price}}vnĐ</td>
                            </tr>
                            @endforeach
                            @endforeach
                            @if (count($carts2) == 0)
        <tr>
            <td colspan="5">No items found.</td>
        </tr>
    @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Cart Section Begin -->
@endsection
