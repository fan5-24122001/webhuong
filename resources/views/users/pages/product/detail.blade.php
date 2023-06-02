@extends('users.master')

@section('content')

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <a href="#">Women’s </a>
                    <span>Essential structured blazer</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__left product__thumb nice-scroll">
                        <a class="pt active" href="#product-1">
                            <img src="{{$data ->image}}" alt="">
                        </a>
                        <a class="pt" href="#product-2">
                            <img src="{{$data ->image}}" alt="">
                        </a>
                        <a class="pt" href="#product-3">
                            <img src="img/product/details/thumb-3.jpg" alt="">
                        </a>
                        <a class="pt" href="#product-4">
                            <img src="img/product/details/thumb-4.jpg" alt="">
                        </a>

                    </div>
                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-hash="product-1" class="product__big__img" src="{{$data ->image}}" alt="">
                            <img data-hash="product-2" class="product__big__img" src="{{$data ->image}}" alt="">
                            <img data-hash="product-3" class="product__big__img" src="img/product/details/product-2.jpg"
                                alt="">
                            <img data-hash="product-4" class="product__big__img" src="img/product/details/product-4.jpg"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3>{{$data->name}}<span></span></h3>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span>( 138 reviews )</span>
                    </div>
                    @if($data->amount >6)

                    @else($data->amount < 6 ) <p> Sản Phẩm Gần Hết Hàng</p>
                        @endif
                        <p> Số Lượng Còn : {{$data->amount}} sản phẩm </p>
                        <div class="product__details__price">{{$data->price}}</span></div>
                        <p>Nemo enim ipsam voluptatem quia aspernatur aut odit aut loret fugit, sed quia consequuntur
                            magni lores eos qui ratione voluptatem sequi nesciunt.</p>
                        <div class="product__details__button">
                            @if($data->amount > 0)
                            @guest
                            @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="cart-btn"><span
                                    class="icon_bag_alt"></span> Add to cart</a>
                            <a href="{{ route('login') }}"
                                class="cart-btn"><span class="icon_bag_alt"></span> Add Love</a>
                            @endif
                            @else
                            @if (Auth::user()->is_admin == 0)
                            <a href="{{ route('home.themcart', [Auth::user()->id,$data->id]) }}" class="cart-btn"><span
                                    class="icon_bag_alt"></span> Add to cart</a>
                            <a href="{{ route('love',['id_user'=> Auth::user()->id,'id_product'=>$data->id ]) }}"
                                class="cart-btn"><span class="icon_bag_alt"></span> Add Love</a>
                            @endif
                            @endguest
                            @else($data->amount < 0) <a class="cart-btn"><span class="icon_bag_alt"></span> Hiện Tại
                                Hàng Đã Hết</a>
                                @endif

                                
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Availability:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                        {{$category}}
                                        </label>
                                    </div>
                                </li>


                                <li>
                                    <span>Promotions:</span>
                                    <p>Free shipping</p>
                                </li>
                            </ul>
                        </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">THÔNG TIN SẢN PHẨM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">HƯỚNG DẪN MUA HÀNG & THANH TOÁN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews
                                ({{$comment-> count()}} )</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <h6>Description</h6>
                            <p>{{$data ->description}}</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                        <h2>Hướng dẫn mua hàng:</h2>
<p>
    Bạn truy cập website của chúng tôi qua địa chỉ: <a href="https://kyo.vn">KYO.VN</a>, xem sản phẩm và lựa chọn sản phẩm cần mua.
    Nhấn nút "MUA NGAY" để đưa sản phẩm vào giỏ hàng.
    Sau khi đã hoàn tất chọn hàng, bạn vào giỏ hàng để xem lại (biểu tượng giỏ hàng ngoài cùng bên phải topbar).
    Chuyển tới trang thanh toán.
    Nhập đầy đủ thông tin cá nhân và thông tin thanh toán vào biểu mẫu.
    Kết thúc đơn hàng, bạn vui lòng chờ nhân viên của chúng tôi điện thoại lại để xác nhận và gửi hàng.
</p>

<h2>Hướng dẫn thanh toán:</h2>
<p>
    Chúng tôi cung cấp 2 hình thức thanh toán: Giao hàng thu tiền COD và Chuyển khoản ngân hàng.
    (1): Bạn đặt hàng và được nhân viên xác nhận qua cuộc gọi. Qua đó, chúng tôi gửi hàng về cho bạn thông qua dịch vụ ship COD. Bạn nhận hàng và thanh toán cho nhân viên giao hàng.
    (2): Sau khi đặt hàng bạn chuyển khoản cho chúng tôi qua một trong các tài khoản ngân hàng sau:
    - Ngân hàng Việt Nam Thịnh Vượng (VPBank) Số tài khoản: 69998689999
    - Ngân hàng Quân Đội (MBBank) Số tài khoản: 9993899699999
    (Thông tin chuyển khoản cũng sẽ được hiển thị ở bước thanh toán khi đặt hàng trên website)
    Sau khi nhận được tiền chúng tôi sẽ gửi hàng cho bạn thông qua đơn vị vận chuyển.
    Note: Sau khi chuyển khoản thành công bạn vui lòng thông tin cho chúng tôi qua Hotline: 0986 448 789 (zalo, imes) hoặc Email: kyoauthentic@gmail.com để đơn hàng được xử lý nhanh nhất.
</p>

                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <h6>Reviews ({{$comment-> count()}} )</h6>
                            <form method="post" action="{{ route('comment.add') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="comment_body" class="form-control" />
                                    <input type="hidden" name="post_id" value="{{ $data->id }}" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-warning" value="Add Comment" />
                                </div>
                            </form>

                            <div>
                                <span>
                                    @include('partials._comment_replies', ['comments' => $data->comments, 'post_id' =>
                                    $data->id])
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="related__title">
                    <h5>RELATED PRODUCTS</h5>
                </div>
            </div>
            @foreach($cateliequan as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                <div class="product__item">
                    <div class="product__item__pic set-bg" >
                    <img src="{{$item ->image}}" alt="Girl in a jacket" >

                        <div class="label new">{{$item->name}}</div>
                        <ul class="product__hover">
                            <li><a href="" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                          
                         
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{ route('home.product', $item->id) }}">{{$item->name}}</a></h6>
                        <div class="rating">
                        <td>
                                        @foreach ($category1 as $ct)
                                        @if ($item->id_category == $ct->id)
                                            {{$ct->name}}
                                        @endif
                                        @endforeach
                                    </td>
                        </div>
                        <div class="product__price">${{ number_format($item->price, 2) }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection