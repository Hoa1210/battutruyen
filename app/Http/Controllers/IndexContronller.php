<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;

class IndexContronller extends Controller
{
    public function home(){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $truyen = Truyen::orderBy('id','DESC')->where('trangthai',0)->get();
        return view('pages.home')->with(compact('danhmuc','truyen'));
    }
    public function danhmuc($slug){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $danhmuc_id = DanhmucTruyen::where('slug_danhmuc', $slug)->first();
        $truyen = Truyen::orderBy('id', 'DESC')->where('trangthai',0)->where('danhmuc_id', $danhmuc_id->id)->get();
        // dd($truyen);
        return view('pages.danhmuc')->with(compact('danhmuc','truyen'));
    }
    public function doctruyen($id){
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        return view('pages.chapter')->with(compact('danhmuc'));
    }

}
