@extends('admin.index')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div style="display: flex; justify-content: space-between;">
                <h2 class="title-5 m-b-35">Danh sách nguời dùng </h2>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $us)
                                <tr class="tr-shadow">
                                    <td>{{$us->id}}</td>
                                    <td><b>{{$us->name}}</b></td> 
                                    <td>{{$us->email}}</td>
                                    <td>{{$us->address}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{route('User.Delete',$us->id)}}" class="item btnDelete"  data-toggle="tooltip" data-placement="top" title="Delete">
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
