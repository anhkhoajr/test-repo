@extends('layout')
@section('title','AnhKhoaS | HCM')
@section('title1','Về chúng tôi')
@section('content')
<!-- Thanh toán Bắt đầu -->
<div class="container-fluid">
    <form method="POST" action="{{route('checkout')}}" class="row px-xl-5">
        @csrf
        <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Địa chỉ thanh toán</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Họ và Tên</label>
                        <input class="form-control" type="text" placeholder="John" name="name" value="{{(Auth::check())?Auth::user()->name:''}}" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="text" placeholder="example@email.com" name="email" value="{{(Auth::check())?Auth::user()->email:''}}" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" type="text" placeholder="+123 456 789" name="phone" value="{{(Auth::check())?Auth::user()->phone:''}}" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" type="text" placeholder="123 Street" name="address" value="{{(Auth::check())?Auth::user()->address:''}}" required>
                    </div>
                    <!-- <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="shipto">
                            <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Gửi đến địa chỉ khác</label>
                        </div>
                    </div> -->
                    <div class="col-md-12">
                        <div class="form-check">
                            <input type="checkbox" id="agree" name="agree" class="form-check-input" required>
                            <label class="form-check-label" for="agree">Tôi đã đọc và đồng ý</label>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-danger">
                {{ session('success') }}
            <a href="{{route('home')}}">tiếp tục mua sắm</a>
            </div>
            @endif
            
            <div class="collapse mb-5" id="shipping-address">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Địa chỉ giao hàng</span></h5>
                <div class="bg-light p-30">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Tên</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Họ</label>
                            <input class="form-control" type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Địa chỉ 1</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Gửi đến địa chỉ khác</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tổng đơn hàng</span></h5>
            <div class="bg-light p-30 mb-5">
                @if(count($cart)>0)
                <div class="border-bottom">
                    <h6 class="mb-3">Sản phẩm</h6>

                    @foreach($cart as $item)
                    <div class="d-flex justify-content-between">
                        <p>{{$item['product_name']}}</p>
                        <p>{{$item['product_price']}}</p>
                    </div>
                    @endforeach
                </div>
                <div class="border-bottom pt-3 pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Tổng phụ</h6>
                        <h6>{{number_format($subtotal)}}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Vận chuyển</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Tổng cộng</h5>
                        <h5>{{number_format($total)}}</h5>
                    </div>
                </div>
                @else
                <p>GIỎ HÀNG TRỐNG</p>
                @endif
            </div>
            <div class="mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thanh toán</span></h5>
                <div class="bg-light p-30">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="paypal">
                            <label class="custom-control-label" for="paypal">Momo</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="directcheck" checked>
                            <label class="custom-control-label" for="directcheck">Tiền Mặt</label>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                            <label class="custom-control-label" for="banktransfer">Chuyển khoản ngân hàng</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Đặt hàng</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Thanh toán Kết thúc -->
@endsection