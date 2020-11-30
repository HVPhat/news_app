<?php

namespace news_app\Http\Controllers;

use news_app\BaoCaoBaiViet;
use news_app\BaiViet;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class BaoCaoBaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $baiViets=DB::select('select distinct bai_viet,tieu_de from bai_viets,bao_cao_bai_viets
                              where bao_cao_bai_viets.deleted_at is null and bai_viets.id = bao_cao_bai_viets.bai_viet');

        return view('bao_cao_bai_viet_table', ['baiViets'=>$baiViets]);
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
     * @param  \news_app\BaoCaoBaiViet  $baoCaoBaiViet
     * @return \Illuminate\Http\Response
     */
    public function show($id_bai_viet)
    {
        //
        //Lấy toàn bộ bảng ghi trong bảng báo cáo của bài viếtv có cột bai_viet = $id_bai_viet
        $baoCaos=DB::select('select * from bao_cao_bai_viets,users
                              where bao_cao_bai_viets.deleted_at is null and bao_cao_bai_viets.nguoi_dung = users.id and bao_cao_bai_viets.bai_viet = '.$id_bai_viet );

        //Lấy nội dung của bài viết bị báo cáo 
        $baiViet=BaiViet::find($id_bai_viet);

        $data=[
            'baoCaos'=>$baoCaos,
            'baiViet'=>$baiViet
        ];
        return view('chi_tiet_bao_cao_bai_viet',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \news_app\BaoCaoBaiViet  $baoCaoBaiViet
     * @return \Illuminate\Http\Response
     */
    public function edit(BaoCaoBaiViet $baoCaoBaiViet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \news_app\BaoCaoBaiViet  $baoCaoBaiViet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaoCaoBaiViet $baoCaoBaiViet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \news_app\BaoCaoBaiViet  $baoCaoBaiViet
     * @return \Illuminate\Http\Response
     */
    public function destroy($baiViet)
    {
        //
        DB::table('bao_cao_bai_viets')->whereIn('bai_viet', [$baiViet])
            ->update([
                'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        
            return redirect()->route('baocaobaiviet.tables');
    }
}
