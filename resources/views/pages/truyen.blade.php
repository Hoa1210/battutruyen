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
                <img src="{{asset('uploads/truyen/'.$truyen->hinhanh)}}" class="img-fluid" alt="">
            </div>
            <div class="col-md-9">
                <ul style="list-style: none;">
                    <li>Tác giả: {{$truyen->tacgia}}</li>
                    <li>Thể loại: Trinh thám</li>
                    <li>Số chapter: 200</li>
                    <li>Só lượt xem: 20000000000</li>
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
        <h4>Mục lục</h4>
        <ul>
            @php
            $mucluc = count($chapter);
            @endphp
            @if($mucluc > 0)
                @foreach ($chapter as $key => $chap)
                <li><a href="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</a></li>
                @endforeach
            @else
            <li>Muc luc dang cap nhat</li>
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