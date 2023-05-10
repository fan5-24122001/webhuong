@extends('users.master')
@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="shop__sidebar">
                    <div class="sidebar__categories">
                        <div class="section-title">
                            <h4>Categories</h4>
                        </div>
                        <div class="categories__accordion">
                            <div class="accordion" id="accordionExample">


                                @foreach($category as $cate)
                                <div class="card">
                                    <div class="card-heading">
                                        <a
                                            href="{{ route('category', ['id_category'=>$cate->id]) }}">{{$cate->name}}</a>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="row">
                    @auth
                    @foreach($pro as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6 mix women">
                        <div class="product__item">
                            <div class="product__item__pic set-bg">
                                <img src="{{$item ->image}}" alt="Girl in a jacket" width="500" height="600">

                                <div class="label new">{{$item->name}}</div>
                                <ul class="product__hover">
                                    <li><a href="" class="image-popup"><span class="arrow_expand"></span></a></li>
                                    <li><a href="#"><span class="icon_heart_alt"></span></a></li>

                                    <li><a href="{{ route('home.themcart', [Auth::user()->id,$item->id]) }}"><span
                                                class="fa fa-shopping-cart"></span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{ route('home.product', $item->id) }}">{{$item->name}}</a></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">${{ number_format($item->price, 2) }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    @foreach($pro as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6 mix women">
                        <div class="product__item">
                            <div class="product__item__pic set-bg">
                                <img src="{{$item ->image}}" alt="Girl in a jacket" width="500" height="600">

                                <div class="label new">{{$item->name}}</div>
                                <ul class="product__hover">
                                    <li><a href="" class="image-popup"><span class="arrow_expand"></span></a></li>
                                    <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                    <li><a href="{{ route('home.product', $item->id) }}"><i
                                                class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{ route('home.product', $item->id) }}">{{$item->name}}</a></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">${{ number_format($item->price, 2) }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endauth
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection