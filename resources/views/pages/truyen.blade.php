@extends('../layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset('uploads/truyen/di-gioi-kham-liem-su3.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-md-9">
                <ul style="list-style: none;">
                    <li>Tác giả: Lương Văn Hòa</li>
                    <li>Thể loại: Trinh thám</li>
                    <li>Số chapter: 200</li>
                    <li>Só lượt xem: 20000000000</li>
                    <li><a href="#">Xem mục lục</a></li>
                    <li><a href="#" class="btn btn-primary">Đọc online</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <p>Mô tả</p>
        </div>
        <hr>
        <h4>Mục lục</h4>
        <ul>
            <li><a href="#">Chương 1: </a></li>
            <li><a href="#">Chương 1: </a></li>
            <li><a href="#">Chương 1: </a></li>
            <li><a href="#">Chương 1: </a></li>
            <li><a href="#">Chương 1: </a></li>
            <li><a href="#">Chương 1: </a></li>
            <li><a href="#">Chương 1: </a></li>
        </ul>
        <hr>
        <h4>Truyện cùng danh mục</h4>
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('uploads/truyen/di-gioi-kham-liem-su3.jpg')}}" class="img-fluid" alt="">
                <h4>Dị giới khâm liệm sư</h4>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/truyen/di-gioi-kham-liem-su3.jpg')}}" class="img-fluid" alt="">
                <h4>Dị giới khâm liệm sư</h4>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/truyen/di-gioi-kham-liem-su3.jpg')}}" class="img-fluid" alt="">
                <h4>Dị giới khâm liệm sư</h4>
            </div>
        </div>

    </div>
    <div class="col-md-3">
        Danh mục truyện
    </div>
</div>
@endsection