@extends('admin.index')
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

<!-- MAIN CONTENT-->
<div style="display: flex; justify-content: space-between;">
    <h2 class="title-5 m-b-35 bg-primary">Danh sách các đơn </h2>
    <a href="{{ route('admin.addBill')}}"><span class="badge badge-primary"><h4>Thêm</h4></span></a></div>
<table class="table table-data2">
    <thead>
        <tr>
            <th>...</th>
            <th>Người đặt</th>
            <th>Email</th>
            <th>Tổng tiền</th>
            <th>Địa chỉ</th>
            <th>Số Điện thoại</th>
            <th>Trạng thái</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $book)
        <tr class="tr-shadow">
            <td>{{$book->id}}</td>
            <td><b>{{$book->name}}</b></td>
            <td><b class="text-danger">{{$book->email}}</b></td>
            <td><b class="text-warning">{{($book->price)}}</b> vnĐ</td>
            <td>{{$book->address}}</td>
            <td>{{$book->numberPhone}}</td>
            <td>
                @if ($book->genaral == 0)
                    <span class="bg-danger text-white">Đơn mới</span>
                @endif
                @if ($book->genaral == 1)
                    <span class="bg-info text-white">Đơn đang giao</span>
                @endif
                @if ($book->genaral == 2)
                    <span class="bg-success text-white">Đơn đã giao</span>
                @endif
                @if ($book->genaral == 3)
                    <span class="bg-warning text-white">Đơn đã xóa</span>
                @endif

            </td>
            <td>
                <div class="table-data-feature">
                    <a  href="{{route('admin.editBill',$book->id)}}" class="item btnEdit" data-toggle="tooltip" data-placement="top" title="Sửa">
                        <i class="zmdi zmdi-edit"></i>
                    </a>

                    @if (!empty($book->idUser))
                    <a  href="{{route('User.sanphambill',[$book->id,$book->idUser] )}}" class="item btnView" data-toggle="tooltip" data-placement="top" title="Xem sản phẩm">
                        <i class="zmdi zmdi-shopping-cart text-warning"></i>
                    </a>
                    @endif


                </div>
            </td>
        </tr>
        <tr class="spacer"></tr>
        @endforeach
    </tbody>
</table>

<form method="POST" action="" id="formDelete">
    @csrf @method('DELETE')
</form>
<div>
    {{$data->appends(request()->all())->links()}}
</div>
@stop()

