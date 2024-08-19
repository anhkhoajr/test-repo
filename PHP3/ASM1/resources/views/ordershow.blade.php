@extends('layout')
@section('title','AnhKhoaS | HCM')
@section('title1','Đơn Hàng')
@section('content')
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            @if (!empty($orderDetails) && count($orderDetails) > 0)
            <h2>Chi tiết đơn hàng</h2>
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderDetails as $detail)
                    <tr>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->price }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ $detail->price * $detail->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            @if (session('error'))
            <div class="alert alert-danger">
            Không có Đơn Hàng
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            <a href="{{route('home')}}">tiếp tục mua sắm</a>
            </div>
            @endif
            @endif
        </div>
    </div>
</div>

@endsection