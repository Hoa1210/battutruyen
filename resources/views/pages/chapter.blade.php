@extends('../layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{url('the-loai/'.$truyen_breadcrumb->theloai->slug_theloai)}}">{{$truyen_breadcrumb->theloai->tentheloai}}</a></li>
        <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen_breadcrumb->danhmuctruyen->slug_danhmuc)}}">{{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$truyen_breadcrumb->tentruyen}}</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12">
        <h4>{{$chapter->truyen->tentruyen}}</h4>
        <p>{{$chapter->tieude}}</p>
        <div class="col-md-5">

        <style>
            .isDisanled{
                color: currentColor;
                pointer-events: none;
                opacity: 0.5;
                text-decoration: none;
            }
        </style>
            <div class="form-group">
                <a href="{{url('xem-chapter/'.$previous_chapter)}}" class="btn btn-success {{$chapter->id==$min_id->id ? 'isDisanled' : ''}}"><</a>
                <select name="select-chapter" class="custom-select select-chapter">
                    @foreach($all_chapter as $key=>$chap)
                    <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                    @endforeach
                </select>
                <a href="{{url('xem-chapter/'.$next_chapter)}}"  class="btn btn-success {{$chapter->id==$max_id->id ? 'isDisanled' : ''}}">></a>
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