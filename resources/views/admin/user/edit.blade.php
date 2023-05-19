@extends('admin.index')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <strong>Phân Quyền</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('User.update', $user->id)}}" method="POST" enctype="multipart/form-data"
                            class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label"> Quyền </label>
                                </div>
                                <div class="col-12 col-md-9">
                                <select class="default-select  form-control wide" name="is_admin">
                                                        @if ($user->is_admin == 0)
                                                            <option selected value="0"> Khách Hàng</option>
                                                            <option value="2">  Nhân Viên</option>
                                                        @endif
                                                        @if ($user->is_admin == 2)
                                                        <option value="0">  Khách Hàng</option>
                                                        <option selected value="2"> Nhân Viên</option>
                                                        @endif
                                </select>
                                </div>
                            </div>
                           
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Cập nhật
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
