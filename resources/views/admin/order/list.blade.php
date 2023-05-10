@extends('admin.index')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div style="display: flex; justify-content: space-between;">
                    <h2 class="title-5 m-b-35">Danh sách thể loại </h2>
                    <a href="{{ route('Category.create') }}"><span class="badge badge-success text-white">
                            <h4>Thêm</h4>
                        </span></a>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tên người đặt</th>
                                        <th>email</th>
                                        <th>SĐT</th>
                                        <th>Số tiền</th>
                                        <th>Địa chỉ</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Orders as $Orders)
                                        <tr class="tr-shadow">
                                            <td>{{ $Orders->id }}</td>
                                            <td>{{ $Orders->name }}</td>
                                            <td>{{ $Orders->email }}</td>
                                            <td>{{ $Orders->numberphone }}</td>
                                            <td>{{ $Orders->total }} &nbsp; vnĐ</td>
                                            <td>{{ $Orders->address }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">{{ $Orders->status == 1 ? 'Vừa tạo' : ($Orders->status == 2 ? 'Chấp nhận đơn' : 'Đã giao') }}
                                                      <span class="caret"></span></button>
                                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('Order.change', ['id'=> $Orders->id, 'type'=>1]) }}">Vừa tạo</a></li>
                                                      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('Order.change', ['id'=> $Orders->id, 'type'=>2]) }}">Chấp nhận đơn</a></li>
                                                      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('Order.change', ['id'=> $Orders->id, 'type'=>3]) }}">Đã giao</a></li>
                                                    </ul>
                                                  </div>
                                            </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="{{ route('Order.show', $Orders->id) }}" class="item btnEdit"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Xem sản phẩm đơn hàng">
                                                        <i class="zmdi zmdi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('Order.Delete', $Orders->id) }}"
                                                        class="item btnDelete" data-toggle="tooltip" data-placement="top"
                                                        title="Delete">
                                                        <i class="zmdi zmdi-delete text-danger"></i>
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
