@extends('layout')
@section('title','AnhKhoaS | HCM')
@section('title1','Home')
@section('content')
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3"></span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-6 mb-5">
            <div class="contact-form bg-light p-30">
                <h3 class="mb-4">Đăng Nhập</h3>
                <form name="sentMessage" novalidate="novalidate" method="post" action="{{route('postlogin')}}">
                    @csrf
                    <div class="control-group mb-3">
                        <input type="text" class="form-control" id="email" placeholder="Your Email" name="email" required>
                    </div>
                    <div class="control-group mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Your Password" name="password" required>
                    </div>
                    @if(session('success'))
                    <div id="successMessage" class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                    @php
                    session()->forget('message');
                    @endphp
                    @endif
                    <div class="space">
                        <input class="btn btn-primary py-2 px-4" type="submit" value="Đăng Nhập" id="sendMessageButton" name="submit-login"></input>
                        <a class="btn btn-primary py-2 px-4" href="{{ route('register') }}">Tạo tài khoản</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 2000);
</script>
@endsection