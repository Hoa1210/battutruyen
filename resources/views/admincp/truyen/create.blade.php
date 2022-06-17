@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm truyện</div>
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

                    <form action="{{route('truyen.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên truyện</label>
                            <input type="text" class="form-control" value="{{old('tentruyen')}}" name="tentruyen" onkeyup="ChangeToSlug()" id="slug"  placeholder="Tên danh mục...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug truyện</label>
                            <input type="text" class="form-control" value="{{old('slug_truyen')}}" name="slug_truyen" id="convert_slug" placeholder="Slug danh mục...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tác giả</label>
                            <input type="text" class="form-control" value="{{old('tacgia')}}" name="tacgia" id="convert_slug"  placeholder="Tên tác giả...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả truyện</label>
                            <textarea name="mota" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Danh mục truyện</label>
                            <select class="form-control" name="danhmuc_id" id="exampleFormControlSelect1">
                                @foreach($danhmuc as $key=>$value)
                                <option value="{{$value->id}}">{{$value->tendanhmuc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" class="form-control" name="hinhanh">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng thái</label>
                            <select class="form-control" name="trangthai" id="exampleFormControlSelect1">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Tắt</option>
                            </select>
                        </div>
                        <button type="submit" name="themtruyen" class="btn btn-primary mt-2">Thêm truyện</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection