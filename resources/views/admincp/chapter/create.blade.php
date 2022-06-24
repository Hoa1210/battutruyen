@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm chapter</div>
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

                    <form action="{{route('chapter.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên chapter</label>
                            <input type="text" class="form-control" value="{{old('tieude')}}" name="tieude" onkeyup="ChangeToSlug()" id="slug" aria-describedby="emailHelp" placeholder="Tên tiêu đề...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug truyện</label>
                            <input type="text" class="form-control" value="{{old('slug_chapter')}}" name="slug_chapter" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug chapter...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả chapter</label>
                            <textarea name="mota" class="form-control" value="{{old('mota')}}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung chapter</label>
                            <textarea name="noidung"  class="form-control" value="{{old('noidung')}}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Truyện</label>
                            <select class="form-control" name="truyen_id" id="exampleFormControlSelect1">
                                @foreach($truyen as $key=>$value)
                                <option value="{{$value->id}}">{{$value->tentruyen}}</option>
                                @endforeach
                            </select>
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