@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Danh sách danh mục</div>

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
                                <th scope="col">Tên thể loại</th>
                                <th scope="col">Slug thể loại</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($theloaitruyen as $key => $theloai)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$theloai->tentheloai}}</td>
                                <td>{{$theloai->slug_theloai}}</td>
                                <td>{{$theloai->mota}}</td>
                                <td>
                                    @if($theloai->trangthai == 1)
                                    <span style="color:red;">Không kích hoạt</span>
                                    @else
                                    <span style="color:greenyellow;">Kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('theloai.edit', [$theloai->id])}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('theloai.destroy', [$theloai->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Bạn muốn xóa thể loại truyện này không?');">Delete</button>
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