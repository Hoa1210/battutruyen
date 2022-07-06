@extends('../layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset('uploads/truyen/'.$truyen->hinhanh)}}" class="img-fluid" alt="">
            </div>
            <div class="col-md-9">
                <ul style="list-style: none;">
                    <li>Tên truyện: {{$truyen->tentruyen}}</li>
                    <li>Tác giả: {{$truyen->tacgia}}</li>
                    <li>Danh mục: <a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
                    <li>Thể loại: <a href="{{url('the-loai/'.$truyen->theloai->slug_theloai)}}">{{$truyen->theloai->tentheloai}}</a></li>
                    <li>Số chapter: 200</li>
                    <li>Số lượt xem: 20000000000</li>
                    <li><a href="#">Xem mục lục</a></li>
                    @if($chapter_dau)
                    <li><a href="{{url('xem-chapter/'.$chapter_dau->slug_chapter)}}" class="btn btn-primary">Đọc online</a></li>
                    @else
                    <li><a href="#" class="btn btn-danger">Đang cập nhật</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <p>Mô tả</p>
        </div>
        <hr>
        <style>
            .tagcloud05 ul {
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .tagcloud05 ul li {
                display: inline-block;
                margin: 0 0 .3em 1em;
                padding: 0;
            }

            .tagcloud05 ul li a {
                position: relative;
                display: inline-block;
                height: 30px;
                line-height: 30px;
                padding: 0 1em;
                background-color: #3498db;
                border-radius: 0 3px 3px 0;
                color: #fff;
                font-size: 13px;
                text-decoration: none;
                -webkit-transition: .2s;
                transition: .2s;
            }

            .tagcloud05 ul li a::before {
                position: absolute;
                top: 0;
                left: -15px;
                content: '';
                width: 0;
                height: 0;
                border-color: transparent #3498db transparent transparent;
                border-style: solid;
                border-width: 15px 15px 15px 0;
                -webkit-transition: .2s;
                transition: .2s;
            }

            .tagcloud05 ul li a::after {
                position: absolute;
                top: 50%;
                left: 0;
                z-index: 2;
                display: block;
                content: '';
                width: 6px;
                height: 6px;
                margin-top: -3px;
                background-color: #fff;
                border-radius: 100%;
            }

            .tagcloud05 ul li span {
                display: block;
                max-width: 100px;
                white-space: nowrap;
                text-overflow: ellipsis;
                overflow: hidden;
            }

            .tagcloud05 ul li a:hover {
                background-color: #555;
                color: #fff;
            }

            .tagcloud05 ul li a:hover::before {
                border-right-color: #555;
            }
        </style>
        <h5>Từ khóa tìm kiếm: </h5>
        @php
        $tukhoa = explode("," , $truyen->tukhoa);
        @endphp
        <div class="tagcloud05">
            <ul>
                @foreach($tukhoa as $key=>$value)
                <li><a href="{{url('tag/'.\Str::slug($value))}}" class="tag-truyen"><span>{{$value;}}</span></a></li>
                @endforeach
            </ul>
        </div>

        <hr>
        <h5>Mục lục</h5>
        <ul>
            @php
            $mucluc = count($chapter);
            @endphp
            @if($mucluc > 0)
            @foreach ($chapter as $key => $chap)
            <li><a href="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</a></li>
            @endforeach
            @else
            <li>Mục lục đang cập nhật!</li>
            @endif

        </ul>
        <hr>
        <h4>Truyện cùng danh mục</h4>
        <div class="row">
            @foreach($cungdanhmuc as $key=>$truyen)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('uploads/truyen/'.$truyen->hinhanh)}}" class="card-img-top" width="250px" height="333px" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">{{$truyen->tentruyen}}</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{url('doc-truyen/'.$truyen->slug_truyen)}}" class="btn btn-sm btn-primary">Đọc ngay</a>
                                <a class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i> 5555</a>
                            </div>
                            <small class="text-muted">9 mins trước</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
    <div class="col-md-3">
        Danh mục truyện
    </div>
</div>
@endsection