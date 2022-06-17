@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Danh sách Chapter</div>

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
                                <th scope="col">Tên chapter</th>
                                <th scope="col">Slug chapter</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Thuộc truyện</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chapter as $key => $value)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$value->tieude}}</td>
                                <td>{{$value->slug_chapter}}</td>
                                <td>{{$value->mota}}</td>
                                <td>{{$value->noidung}}</td>
                                <td>{{$value->truyen->tentruyen}}</td>
                                <td>
                                    @if($value->trangthai == 1)
                                    <span style="color:red;">Không kích hoạt</span>
                                    @else
                                    <span style="color:greenyellow;">Kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('chapter.edit', [$value->id])}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('chapter.destroy', [$value->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Bạn muốn xóa chapter này không?');">Delete</button>
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