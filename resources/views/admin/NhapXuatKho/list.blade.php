@extends('admin.index')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div style="display: flex; justify-content: space-between;">
                <h2 class="title-5 m-b-35">Danh sách thể loại </h2>
                <a href="{{ route('NhapXuatKho.create')}}"><span class="badge badge-success text-white"><h4>Thêm</h4></span></a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Mã</th>
                                    <th>Loại</th>
                                    <th>Số lượng</th>
                                    <th>Tên sp Nhập</th>
                                    <th>Hành động</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($NhapXuatKho as $NhapXuat)
                                <tr class="tr-shadow">
                                    <td>{{$NhapXuat->id}}</td>
                                    <td>{{$NhapXuat->code}}</td>
                                    <td>{{$NhapXuat->type == 1 ? " Nhập kho " : " Xuất kho "}}</td>
                                    <td>{{$NhapXuat->amount}}</td>
                                    <td>
                                    @foreach ($product as $pro)
                                        @if ($pro->id == $NhapXuat->id_product)
                                            <option >{{$pro->name}}</option>
                                        @else
                                     
                                        @endif
                                        @endforeach

                                   
                                    <td>
                                        <div class="table-data-feature">
                                            <a  href="{{route('NhapXuatKho.edit',$NhapXuat->id)}}" class="item btnEdit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="{{route('NhapXuatKho.Delete',$NhapXuat->id)}}" class="item btnDelete"  data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i  class="zmdi zmdi-delete text-danger"></i>
                                            </a>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
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
