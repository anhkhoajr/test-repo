@extends('layout')
@section('title','AnhKhoaS | HCM')
@section('title1','Product')
@section('content')
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                <a class="breadcrumb-item text-dark" href="index.php?pg=product">sản phẩm</a>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Price Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Danh mục</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <ul>
                        @foreach($categories as $item)
                        <li><a href="{{ route('product', ['category_id' => $item->id]) }}" style="color: black; font-size: large; font-weight: 450;">{{$item -> name}}</a></li>
                        @endforeach
                    </ul>
                </form>
            </div>
            <!-- Price End -->

        </div>
        <!-- Shop Sidebar End -->
        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                </div>
                <div class="container-fluid pt-5 pb-3">
                    <!-- <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">sản phẩm xem nhiều</span></h2> -->
                    <div class="row px-xl-5">
                        @foreach($products as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <a href="{{ route('detail',['product_id' => $item -> id])}}">
                                        <img class="img-fluid w-100" src="{{ asset('img/' . $item->img) }}" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href="{{ route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href="{{ route('favorites') }}"><i class="far fa-heart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href="{{ route('detail',['product_id' => $item -> id])}}"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h4 text-decoration-none text-truncate" href="">{{$item -> name}}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5>{{$item -> price}}</h5>
                                        <h6 class="text-muted ml-2"></h6>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small>{{$item -> view}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                            {{$products->links('pagination::default')}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
@endsection