@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật thể loại</div>
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

                    <form action="{{route('theloai.update', [$theloai->id])}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thể loại</label>
                            <input type="text" class="form-control" value="{{$theloai->tentheloai}}" name="tentheloai" onkeyup="ChangeToSlug()" id="slug" aria-describedby="emailHelp" placeholder="Tên thể loại...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug danh mục</label>
                            <input type="text" class="form-control" value="{{$theloai->slug_theloai}}" name="slug_theloai" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug thể loại...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả danh mục</label>
                            <input type="text" class="form-control" value="{{$theloai->mota}}" name="mota" aria-describedby="emailHelp" placeholder="Mô tả...">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng thái</label>
                            <select class="form-control" name="trangthai" id="exampleFormControlSelect1">
                                @if($theloai->trangthai == 0)
                                <option selected value="0">Kích hoạt</option>
                                <option value="1">Tắt</option>
                                @else
                                <option value="0">Kích hoạt</option>
                                <option selected value="1">Tắt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="capnhat" class="btn btn-success mt-2">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection