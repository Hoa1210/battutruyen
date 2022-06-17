@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật truyen</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{route('truyen.update', [$truyen->id])}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên truyện</label>
                            <input type="text" class="form-control" value="{{$truyen->tentruyen}}" name="tentruyen" onkeyup="ChangeToSlug()" id="slug"  placeholder="Tên danh mục...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug truyện</label>
                            <input type="text" class="form-control" value="{{$truyen->slug_truyen}}" name="slug_truyen" id="convert_slug"  placeholder="Slug danh mục...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tác giả</label>
                            <input type="text" class="form-control" value="{{$truyen->tacgia}}" name="tacgia" id="convert_slug"  placeholder="Tên tác giả...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả truyện</label>
                            <textarea name="mota" class="form-control">{{$truyen->mota}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Danh mục truyện</label>
                            <select class="form-control" name="danhmuc_id" id="exampleFormControlSelect1">
                                @foreach($danhmuc as $key=>$value)
                                <option {{$value->id == $truyen->danhmuc_id ? "selected" : ""}} value="{{$value->id}}">{{$value->tendanhmuc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" class="form-control" name="hinhanh">
                            <img src="{{asset('uploads/truyen/'.$truyen->hinhanh)}}" height="300" width="200">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng thái</label>
                            <select class="form-control" name="trangthai" id="exampleFormControlSelect1">
                                @if($truyen->trangthai == 0)
                                <option selected value="0">Kích hoạt</option>
                                <option value="1">Tắt</option>
                                @else
                                <option value="0">Kích hoạt</option>
                                <option selected value="1">Tắt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="themtruyen" class="btn btn-primary mt-2">Cập nhật</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection