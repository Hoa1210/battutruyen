@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm thể loại</div>
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

                    <form action="{{route('theloai.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thể loại</label>
                            <input type="text" class="form-control" value="{{old('tentheloai')}}" name="tentheloai" onkeyup="ChangeToSlug()" id="slug" aria-describedby="emailHelp" placeholder="Tên thể loại...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug thể loại</label>
                            <input type="text" class="form-control" value="{{old('slug_theloai')}}" name="slug_theloai" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug thể loại...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả thể loại</label>
                            <input type="text" class="form-control"  value="{{old('mota')}}" name="mota" aria-describedby="emailHelp" placeholder="Mô tả...">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng thái</label>
                            <select class="form-control" name="trangthai" id="exampleFormControlSelect1">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Tắt</option>
                            </select>
                        </div>
                        <button type="submit" name="themtheloai" class="btn btn-primary mt-2">Thêm thể loại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection