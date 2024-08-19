@extends('admin.layout')
@section('title','Admin')
@section('content')
<div class="main-content">
    <h3 class="title-page">
        Sản phẩm
    </h3>
    <div class="d-flex justify-content-start">
        <form class="form-search" action="{{ route('productlist') }}">
            <fieldset class="name">
                <input type="text" placeholder="Tìm kiếm..." name="search" tabindex="2" value="{{ request()->query('search') }}" aria-required="true" required>
            </fieldset>

        </form>
    </div>
    @if(session('success'))
    <div id="successMessage" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="d-flex justify-content-end">
        <a href="{{route('addproduct')}}" class="btn mb-2" style="background-color: #add8e6 ;">Thêm sản phẩm</a>
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>img</th>
                <th>price</th>
                <th>Start date</th>
                <th>Sửa/Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <img src="{{ asset('img/'.$item->img) }}" alt="" style="width: 100px; height: auto;">
                </td>
                <td>{{$item->price}}</td>
                <td>{{$item->updated_at}}</td>
                <td>
                    <a href="{{ route('edit', $item->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                    <a href="{{ route('destroy', $item->id) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();"><i class="fa-solid fa-trash"></i> Xóa</a>
                    <form id="delete-form-{{ $item->id }}" action="{{ route('destroy', $item->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>img</th>
                <th>price</th>
                <th>Start date</th>
                <th>Sửa/Xóa</th>
            </tr>
        </tfoot>
        </tfoot>
    </table>
    <div class="pagination">
        {{$product->links('pagination::default')}}
    </div>
</div>
<script>
    // Hàm ẩn thông báo sau 3 giây
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 2000); // 3000 milliseconds = 3 seconds
</script>
@endsection