@extends('../layout')
@section('slide')
<!-- @include('pages.slide') -->
@endsection
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="#">Thể loại</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$tentheloai}}</li>
    </ol>
</nav>

<h3>{{$tentheloai}}</h3>
<a href="#">Xem tất cả </a>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            @php
            $count = count($truyen);
            @endphp
            @if($count != 0)
            @foreach($truyen as $key=>$truyen)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{asset('uploads/truyen/'.$truyen->hinhanh)}}" class="card-img-top" width="250px" height="333px" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">{{$truyen->tentruyen}}</h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{url('doc-truyen/'.$truyen->id)}}" class="btn btn-sm btn-primary">Đọc ngay</a>
                                <a class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i> 5555</a>
                            </div>
                            <small class="text-muted">9 mins trước</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-md-12">
                <p>Truyện đang cập nhật!</p>
            </div>
            @endif

        </div>
    </div>
</div>


@endsection