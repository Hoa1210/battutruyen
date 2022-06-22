@extends('../layout')
@section('slide')
<!-- @include('pages.slide') -->
@endsection
@section('content')
<!-- ----------------------Truyện mới cập nhật----------------------- -->

<h3>Truyện mới cập nhật</h3>
<a href="#">Xem tất cả </a>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            @foreach($truyen as $key=>$truyen)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{asset('uploads/truyen/'.$truyen->hinhanh)}}" class="card-img-top" width="250px" height="333px" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">{{$truyen->tentruyen}}</h4>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
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
</div>


@endsection