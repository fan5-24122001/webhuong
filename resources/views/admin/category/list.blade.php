@extends('admin.index')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div style="display: flex; justify-content: space-between;">
                <h2 class="title-5 m-b-35">Danh sách thể loại </h2>
                <a href="{{ route('Category.create')}}"><span class="badge badge-success text-white"><h4>Thêm</h4></span></a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $cate)
                                <tr class="tr-shadow">
                                    <td>{{$cate->id}}</td>
                                    <td><b>{{$cate->name}}</b></td> 
                                    <td>
                                        <div class="table-data-feature">
                                            <a  href="{{route('Category.edit',$cate->id)}}" class="item btnEdit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="{{route('Category.Delete',$cate->id)}}" class="item btnDelete"  data-toggle="tooltip" data-placement="top" title="Delete">
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
