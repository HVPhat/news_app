<?php

namespace news_app\Http\Controllers;

use news_app\BinhLuan;
use news_app\BaiViet;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $binh_luan=BinhLuan::all();
        return view('binh_luan\binhluan', ['binh_luan'=>$binh_luan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \news_app\BinhLuan  $binhLuan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $bai_viet=BaiViet::find($id);
        return view('bai_viet\detail_post',$bai_viet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \news_app\BinhLuan  $binhLuan
     * @return \Illuminate\Http\Response
     */
    public function edit(BinhLuan $binhLuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \news_app\BinhLuan  $binhLuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BinhLuan $binhLuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \news_app\BinhLuan  $binhLuan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $binh_luan=BinhLuan::find($id);
        $binh_luan->delete();
        return redirect()->route('binhluan.index');
    }
}
