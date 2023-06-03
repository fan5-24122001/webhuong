@extends('users.master')
@section('content') 
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>Profile User</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Section Begin -->
<section class="shop spad">
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Chnage Profile') }}</div>

                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        
                    @method('PUT')
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Name</label>
                                <input name="name" type="text" value="{{ $user->name }}" class="form-control
                                    placeholder="Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">Address</label>
                                <input name="address" type="text" value="{{ $user->address }}"class="form-control 
                                    placeholder="Adress" required>
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label"><a href="{{ route('change-password') }}">Thay đổi password</a></label>
                                
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success" style="margin-top:20px">Submit</button> 

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
</section>
@endsection
