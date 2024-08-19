@extends('layout')
@section('title','AnhKhoaS | HCM')
@section('title1','Home')
@section('content')
<main>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <a class="breadcrumb-item text-dark" href="index.php?pg=product">Sản Phẩm</a>
                    <span class="breadcrumb-item active">

                    </span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <form action="{{ route('addcart') }}" name="cart" method="post" class="container-fluid pb-5">
        @csrf
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('img/'.$product->img) }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{ $product->name }}</h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1"></small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">{{ $product->price }}</h3>
                    <p class="mb-4">{{ $product->description }}</p>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <input type="number" class="form-control bg-secondary border-0 text-center" name="soluong" min="1" value="1" max="10">
                        </div>

                        <!-- Hidden fields to include product information -->
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="product_name" value="{{ $product->name }}">
                        <input type="hidden" name="product_price" value="{{ $product->price }}">
                        <input type="hidden" name="product_img" value="{{ $product->img }}">

                        <button type="submit" name="cart" value="add_to_cart" class="btn btn-primary px-3">
                            <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">sản phẩm Liên quan</span></h2>
        <div class="row px-xl-5">
            @foreach($splq as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <a href="{{ route('detail',['product_id' => $item -> id])}}">
                            <img class="img-fluid w-100" src="{{ asset('img/'.$item->img) }}" alt="">
                        </a>
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="{{ route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="{{ route('detail',['product_id' => $item -> id])}}"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="{{ route('detail',['product_id' => $item -> id])}}">{{$item->name }}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>{{$item->price}}</h5>
                            <h6 class="text-muted ml-2"><del></del></h6>
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
    </div>
</main>
@endsection