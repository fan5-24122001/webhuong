@extends('admin.index')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div style="display: flex; justify-content: space-between;">
                    <h2 class="title-5 m-b-35">Danh sách Sản phẩm đã đặt </h2>
                    {{-- <a href="{{ route('Category.create')}}"><span class="badge badge-success text-white"><h4>Thêm</h4></span></a> --}}
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <h2>Tổng số tiền đơn này: &nbsp; <span class="text-danger">{{ $Order->total }}</span> vnĐ</h2>
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Id sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số tiền</th>
                                        <th>Số lượng</th>
                                        {{-- <th>Trạng thái</th> --}}
                                        <th>Hành động</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Carts as $Carts)
                                        <tr class="tr-shadow">
                                            <td>{{ $Carts->id }}</td>
                                            <td>{{ \App\Models\Product::find($Carts->id_product)->name }}</td>
                                            <td>{{ \App\Models\Product::find($Carts->id_product)->price }}</td>
                                            <td>{{ $Carts->amount }}</td>
                                            {{-- <td>{{$Carts->status == 1 ? "Vừa tạo" : ($Carts->status == 2 ? 'Chấp nhận đơn' : 'Đã giao')}}</td> --}}
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="{{ route('Product.edit', $Carts->id_product) }}"
                                                        class="item btnEdit" data-toggle="tooltip" data-placement="top"
                                                        title="Xem sản phẩm">
                                                        <i class="zmdi zmdi-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer">

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
