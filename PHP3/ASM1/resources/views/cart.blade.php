@extends('layout')
@section('title','AnhKhoaS | HCM')
@section('title1','Giỏ Hàng')
@section('content')
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            @if(session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
            @endif
            @if(empty($cart))
            <h2>Giỏ của bạn trống trơn.</h2>
            <a href="{{route('home')}}">tiếp tục mua sắm</a>
            @else
            @if(session('error'))
            <div class="alert alert-danger" id="successMessage">
                {{ session('error') }}
            </div>
            @endif
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Stt</th>
                        <th>Img</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($cart as $index => $item)
                    <tr>
                        <td class="align-middle">{{ $index + 1 }}</td>
                        <td class="align-middle"><img src="{{ asset('img/' . $item['product_img']) }}" alt="" style="width: 50px;"></td>
                        <td class="align-middle">{{ $item['product_name'] }}</td>
                        <td class="align-middle">{{ $item['product_price'] }}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{ $item['soluong'] }}">
                            </div>
                        </td>
                        <td class="align-middle">{{ $item['soluong'] * $item['product_price'] }}</td>
                        <td class="align-middle">
                            <form action="{{ route('removeFromCart', ['productId' => $item['product_id']]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Nhập</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Giỏ Hàng</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>{{ number_format($subtotal, 0, ',', '.')}}VNĐ </h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6> <!-- Assuming shipping cost is fixed at $10 -->
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Tổng tiền</h5>
                        <h5>{{ number_format($total, 0, ',', '.') }}VNĐ</h5> <!-- Total including shipping -->
                    </div>
                    <a href="{{route('showcheckout')}}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Đặt Hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Hàm ẩn thông báo sau 3 giây
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 2000); // 3000 milliseconds = 3 seconds
</script>
@endsection