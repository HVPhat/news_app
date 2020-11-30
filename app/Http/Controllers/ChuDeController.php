<?php

namespace news_app\Http\Controllers;

use news_app\ChuDe;
use Illuminate\Http\Request;

class ChuDeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $chuDes=ChuDe::all();
        return view('chu_de_table', ['chuDes'=>$chuDes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add_chu_de');
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
        $user=CHuDe::create([
            'ten_chu_de'=>$request['ten_chu_de'],
        ]);
        return redirect()->route('chude.tables');
    }

    /**
     * Display the specified resource.
     *
     * @param  \news_app\ChuDe  $chuDe
     * @return \Illuminate\Http\Response
     */
    public function show(ChuDe $chuDe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \news_app\ChuDe  $chuDe
     * @return \Illuminate\Http\Response
     */
    public function edit(ChuDe $chuDe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \news_app\ChuDe  $chuDe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChuDe $chuDe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \news_app\ChuDe  $chuDe
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChuDe $chuDe)
    {
        //
    }
}
