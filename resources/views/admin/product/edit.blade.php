@extends('admin.index')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <strong>Sửa Sản phẩm</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('Product.EditPost', ['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data"
                            class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Loại sản phẩm</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="id_category" id="">
                                        @foreach ($cate as $ca)
                                            <option {{ $ca->id == $product->id_category ? 'selected' : '' }}
                                                value="{{ $ca->id }}">{{ $ca->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_category')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Tên</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" value="{{ $product->name }}" name="name"
                                        placeholder="Nhập" class="form-control">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Số lượng</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="text-input" value="{{ $product->amount }}" name="amount" placeholder="Nhập"
                                        class="form-control">
                                    @error('amount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Thông tin chi tiết</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea id="text-input" name="description" placeholder="Nhập" class="form-control">{{ $product->description }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Giá / 1 sản phẩm</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" value="{{ $product->price }}" id="text-input" name="price" placeholder="Nhập"
                                        class="form-control">
                                    @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="image_here">
                                    @foreach (explode('|',$product->image) as $key => $image)
                                    <div class="row form-group image_count">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Ảnh {{$key+1}}</label>
                                        </div>
                                        <div class="col-12 col-md-5">
                                            <img src="{{ asset($image) }}" alt="">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <input type="file" id="text-input" name="image[]" alt="tệp thay thế"
                                                class="form-control">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row form-group">
                                    <button type="button" class="btn btn-primary btn-sm btnAddImage">
                                        <i class="fa fa-dot-circle-o"></i> Thêm ảnh
                                    </button>
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
