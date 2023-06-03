@extends('admin.index')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <strong> Sửa Profile</strong>
                    </div>
                    <div class="card-body card-block">
                    @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                        <form action="{{ route('User.update', $user->id)}}" method="POST" enctype="multipart/form-data"
                            class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                              
                                <div class="col-12 col-md-9">
                                <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="address" name="address" type="text" value ="{{$user->address}}" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                </div>
                                <div class="col-12 col-md-9">
                                <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" name="name" type="text"value ="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
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
