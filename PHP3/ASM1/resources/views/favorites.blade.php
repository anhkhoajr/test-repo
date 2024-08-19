@extends('layout')
@section('title','AnhKhoaS | HCM')
@section('title1','Home')
@section('content')
<div class="container">
    <h1>Danh sách yêu thích</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        @forelse ($favorites as $item)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        <form action="{{ route('favorites.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa khỏi yêu thích</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>Bạn chưa có mục yêu thích nào.</p>
        @endforelse
    </div>
</div>
@endsection