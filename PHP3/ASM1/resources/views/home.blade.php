@extends('layout')
@section('title','AnhKhoaS | HCM')
@section('title1','Home')
@section('content')
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">sản phẩm mới</span></h2>
    <div class="row px-xl-5">
        @foreach($productall as $item)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <a href="{{ route('detail',['product_id' => $item -> id])}}">
                        <img class="img-fluid w-100" src="img/{{$item->img}}" alt="">
                    </a>
                    <div class="product-action">
                        <a class="btn btn-outline-dark btn-square" href="{{ route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                        <a class="btn btn-outline-dark btn-square" href="{{ route('detail',['product_id' => $item -> id])}}"><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a class="h4 text-decoration-none text-truncate" href="">{{$item->name}}</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>{{$item->price}} VNĐ</h5>
                        <h6 class="text-muted ml-2"></h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-1">
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small>(99)</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">sản phẩm xem nhiều</span></h2>
    <div class="row px-xl-5">
        @foreach($TopViewed as $item)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <a href="{{ route('detail',['product_id' => $item -> id])}}">
                        <img class="img-fluid w-100" src="img/{{$item->img}}" alt="">
                    </a>
                    <div class="product-action">
                        <a class="btn btn-outline-dark btn-square" href="{{ route('addcart') }}"><i class="fa fa-shopping-cart"></i></a>
                        <a class="btn btn-outline-dark btn-square" href="{{ route('favorites') }}"><i class="far fa-heart"></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                        <a class="btn btn-outline-dark btn-square" href="{{ route('detail',['product_id' => $item -> id])}}"><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a class="h4 text-decoration-none text-truncate" href="">{{$item->name}}</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>{{$item->price}} VNĐ</h5>
                        <h6 class="text-muted ml-2"></h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-1">
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small>(99)</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endsection