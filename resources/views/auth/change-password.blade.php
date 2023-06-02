@extends('layouts.app')

@section('content')
<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <input type="password" name="current_password" placeholder="Current Password">
    <input type="password" name="new_password" placeholder="New Password">
    <input type="password" name="confirm_password" placeholder="Confirm Password">
    <button type="submit">Change Password</button>
</form>

@endsection
