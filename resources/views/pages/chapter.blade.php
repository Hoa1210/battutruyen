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
    <div class="col-md-12">

        <h4>{{$chapter->truyen->tentruyen}}</h4>
        <p>{{$chapter->tieude}}</p>
        <div class="col-md-5">
            <div class="form-group">
                <label for="exampleInputEmail1">Chon chuong</label>
                <select name="trangthai" class="custom-select">
                    @foreach($all_chapter as $key=>$chap)
                    <option value="0">{{$chap->tieude}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="noidungchuong">
            {!! $chapter->noidung !!}
        </div>

    </div>


</div>
@endsection