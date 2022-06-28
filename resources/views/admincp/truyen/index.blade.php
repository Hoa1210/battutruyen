@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Danh sách truyện</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên truyện</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Slug truyện</th>
                                <th scope="col">Tác giả</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Thể loại</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_truyen as $key => $truyen)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$truyen->tentruyen}}</td>
                                <td><img src="{{asset('uploads/truyen/'.$truyen->hinhanh)}}" height="300" width="200"></td>
                                <td>{{$truyen->slug_truyen}}</td>
                                <td>{{$truyen->tacgia}}</td>
                                <td>{{$truyen->mota}}</td>
                                <td>{{$truyen->danhmuctruyen->tendanhmuc}}</td>
                                <td>{{$truyen->theloai->tentheloai}}</td>
                                <td>
                                    @if($truyen->trangthai == 1)
                                    <span style="color:red;">Không kích hoạt</span>
                                    @else
                                    <span style="color:greenyellow;">Kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('truyen.edit', [$truyen->id])}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('truyen.destroy', [$truyen->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Bạn muốn xóa truyện này không?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection