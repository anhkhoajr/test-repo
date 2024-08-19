@extends('layout')
@section('title','AnhKhoaS | HCM')
@section('title1','Đăng Ký')
@section('content')
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3"></span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-6 mb-5">
            <div class="contact-form bg-light p-30">
                <h3 class="mb-4">Đăng Ký</h3>
                <!-- Blade Template File -->
                <form method="post" action="{{ route('postregister') }}" name="sentMessage" novalidate="novalidate">
                    @csrf <!-- Add CSRF token for security -->
                    <div class="control-group mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="control-group mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="control-group mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" required>
                    </div>
                    <div class="control-group mb-3">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                    </div>
                    @if (session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                        @php
                            session()->forget('message');
                        @endphp
                    @endif
                    <div>
                        <input class="btn btn-primary py-2 px-4" type="submit" value="Đăng Ký" name="dangky">
                    </div>
                </form>

                @endsection