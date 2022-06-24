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
                <a href="" class="btn btn-success"><</a>
                <select name="select-chapter" class="custom-select select-chapter">
                    @foreach($all_chapter as $key=>$chap)
                    <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                    @endforeach
                </select>
                <a href="" class="btn btn-success">></a>
            </div>
        </div>
        <div class="noidungchuong">
            {!! $chapter->noidung !!}
        </div>
        <div class="form-group">
        <a href="" class="btn btn-success"><</a>
            <select name="select-chapter" class="custom-select select-chapter">
                @foreach($all_chapter as $key=>$chap)
                <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                @endforeach
            </select>
        <a href="" class="btn btn-success">></a>
        </div>
    </div>


</div>
@endsection