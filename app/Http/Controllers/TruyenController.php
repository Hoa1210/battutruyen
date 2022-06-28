<?php

namespace App\Http\Controllers;

use App\Models\DanhmucTruyen;
use App\Models\Theloai;
use Illuminate\Http\Request;
use App\Models\Truyen;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_truyen = Truyen::with('danhmuctruyen','theloai')->orderBy('id','DESC')->get();
        return view('admincp.truyen.index')->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        return view('admincp.truyen.create')->with(compact('danhmuc','theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
            'tentruyen' => 'required|unique:truyen|max:255',
            'slug_truyen' => 'required|unique:truyen|max:255',
            'tacgia' => 'required|max:255',
            'mota' =>'required',
            'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'trangthai' => 'required',
            'danhmuc_id' => 'required',
            'theloai_id' => 'required',
            ],
            [
            'tentruyen.unique' => 'Tên truyện đã có, xin điền tên khác!',
            'tentruyen.required' => 'Tên truyện phải có',
            'slug_truyen.unique' => 'Slug truyện đã có, xin điền tên khác!',
            'slug_truyen.required' => 'Slug truyện phải có',
            'tacgia.required' => 'Tên tác giả phải có',
            'mota.required' =>'Mô tả truyện phải có',
            'hinhanh.required' =>'Hình ảnh truyện phải có',
            ]
        );


        $truyen = new Truyen();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->mota = $data['mota'];
        $truyen->danhmuc_id = $data['danhmuc_id'];
        $truyen->theloai_id = $data['theloai_id'];
        $truyen->trangthai = $data['trangthai'];

        $get_image = $request->hinhanh;
        $path = 'uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
    
        $truyen->hinhanh = $new_image;

        $truyen->save();

        return redirect()->back()->with('status', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $truyen = Truyen::find($id);
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        return view('admincp.truyen.edit')->with(compact('truyen','danhmuc','theloai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
            'tentruyen' => 'required|max:255',
            'slug_truyen' => 'required|max:255',
            'tacgia' => 'required|max:255',
            'mota' =>'required',
            'trangthai' => 'required',
            'danhmuc_id' => 'required',
            'theloai_id' => 'required',
            ],
            [
            'tentruyen.required' => 'Tên truyện phải có',
            'slug_truyen.required' => 'Slug truyện phải có',
            'tacgia.required' => 'Slug truyện phải có',
            'mota.required' =>'Mô tả truyện phải có',
            ]
        );


        $truyen = Truyen::find($id);
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->mota = $data['mota'];
        $truyen->danhmuc_id = $data['danhmuc_id'];
        $truyen->theloai_id = $data['theloai_id'];
        $truyen->trangthai = $data['trangthai'];

        $get_image = $request->hinhanh;
        if($get_image){
            $path1 = 'uploads/truyen/'.$truyen->hinhanh;
            if(file_exists($path1)){
                unlink($path1);
            }
            $path = 'uploads/truyen/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);

            $truyen->hinhanh = $new_image;
        }
        

        $truyen->save();

        return redirect()->back()->with('status', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $truyen = Truyen::find($id);
        $path = 'uploads/truyen/'.$truyen->hinhanh;
        if(file_exists($path)){
            unlink($path);
        }

        Truyen::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa truyện thành công');
    }
}
