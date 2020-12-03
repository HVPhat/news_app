<?php

namespace news_app\Http\Controllers;

use news_app\BaiViet;
use news_app\ChuDe;
use Illuminate\Http\Request;


class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bai_viets=BaiViet::all();
        return view('post', ['bai_viets'=>$bai_viets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $chuDe=ChuDe::all();
        return view('add_post',['chuDe'=>$chuDe]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('hinh_anh'))
        {
            $image_name = $request->file('hinh_anh')->getClientOriginalName();
            $filename = pathinfo($image_name,PATHINFO_FILENAME);
            $image_ext = $request->file('hinh_anh')->getClientOriginalExtension();
            $filenameToStore = $filename.'-'.time().'.'.$image_ext;
            $path = $request->file('hinh_anh')->storeAs('',$filenameToStore);
        }
        else
        {
            $filenameToStore = 'noimage.jpg';
        }
        $bai_viets=BaiViet::create([
            'tieu_de'=>$request['tieu_de'],
            'chu_de'=>$request['chu_de'],
            'hinh_anh'=>$filenameToStore,
            'noi_dung'=>$request['noi_dung'],
            'tac_gia'=>$request['tac_gia'],
            'nguoi_duyet'=>$request['tac_gia']
        ]);
        return redirect()->route('post.tables');
    }

    /**
     * Display the specified resource.
     *
     * @param  \news_app\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function show(BaiViet $baiViet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \news_app\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $bai_viets=BaiViet::find($id);
        return view('edit_post',$bai_viets);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \news_app\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($request->hasFile('hinh_anh'))
        {
            $image_name = $request->file('hinh_anh')->getClientOriginalName();
            $filename = pathinfo($image_name,PATHINFO_FILENAME);
            $image_ext = $request->file('hinh_anh')->getClientOriginalExtension();
            $filenameToStore = $filename.'-'.time().'.'.$image_ext;
            $path = $request->file('hinh_anh')->storeAs('',$filenameToStore);
        }
        else
        {
            $filenameToStore = 'noimage.jpg';
        }
        $bai_viets=BaiViet::find($id);
        $bai_viets->tieu_de=$request['tieu_de'];
        $bai_viets->chu_de=$request['chu_de'];
        $bai_viets->hinh_anh=$filenameToStore;
        $bai_viets->noi_dung=$request['noi_dung'];
        $bai_viets->tac_gia=$request['tac_gia'];
        $bai_viets->save();
        return redirect()->route('post.tables');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \news_app\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $bai_viets=BaiViet::find($id);
        $bai_viets->delete();
        return redirect()->route('post.tables');
    }
    public function approval($id)
    {
        //
        $bai_viets=BaiViet::find($id);
        $bai_viets->da_duyet = 1;
        $bai_viets->save();
        return redirect()->route('post.tables');
    }
    
    public function TacGia()
    {
        $tacGia = BaiViet::find(2)->TacGia;
        return ($tacGia);
    }

    public function ChuDe($id)
    {
        $chuDe = BaiViet::find($id)->ChuDe;
        return ($chuDe);
    }
}
