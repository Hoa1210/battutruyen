<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Theloai;
use App\Models\Truyen;

class IndexContronller extends Controller
{
    public function home(){
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $truyen = Truyen::orderBy('id','DESC')->where('trangthai',0)->get();
        return view('pages.home')->with(compact('theloai','danhmuc','truyen'));
    }
    public function danhmuc($slug){
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $danhmuc_id = DanhmucTruyen::where('slug_danhmuc', $slug)->first();
        $truyen = Truyen::orderBy('id', 'DESC')->where('trangthai',0)->where('danhmuc_id', $danhmuc_id->id)->get();
        $tendanhmuc = $danhmuc_id->tendanhmuc;
        return view('pages.danhmuc')->with(compact('theloai','danhmuc','truyen','tendanhmuc'));
    }
    public function doctruyen($slug){
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $truyen = Truyen::with('danhmuctruyen')->where('slug_truyen',$slug)->where('trangthai',0)->first();
        $chapter  = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->get();
        $chapter_dau  = Chapter::with('truyen')->orderBy('id','DESC')->where('truyen_id',$truyen->id)->first();
       
        $cungdanhmuc = Truyen::with('danhmuctruyen')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id])->get();
        return view('pages.truyen')->with(compact('theloai','danhmuc','truyen','chapter','chapter_dau','cungdanhmuc'));
    }

    public function xemchapter($slug){
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $truyen = Chapter::where('slug_chapter',$slug)->first();
        $chapter = Chapter::with('truyen')->where('slug_chapter',$slug)->where('truyen_id',$truyen->truyen_id)->first();
        $all_chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->truyen_id)->get();

        $next_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');
        $previous_chapter  = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->max('slug_chapter');
        
        $max_id =Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','DESC')->first();
        $min_id =Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','ASC')->first();
        return view('pages.chapter')->with(compact('theloai','danhmuc','truyen','chapter','all_chapter','next_chapter','previous_chapter','max_id','min_id'));
    }

    public function theloai($slug) {
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = Theloai::orderBy('id','DESC')->get();
        $theloai_id = Theloai::where('slug_theloai', $slug)->first();
        $truyen = Truyen::orderBy('id', 'DESC')->where('trangthai',0)->where('theloai_id', $theloai_id->id)->get();
        $tentheloai = $theloai_id->tentheloai;
        return view('pages.theloai')->with(compact('theloai','danhmuc','theloai_id','truyen','tentheloai'));
    }
}
