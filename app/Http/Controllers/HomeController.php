<?php

namespace news_app\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('login');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function table()
    {
        $sp=[
            "dssp"=>[
                ["Id"=>1, "ProName"=>"Sản phẩm 1", "ProType"=>"Loại sản phẩm 1", "Price"=>50000],
                ["Id"=>2, "ProName"=>"Sản phẩm 2", "ProType"=>"Loại sản phẩm 2", "Price"=>50000],
                ["Id"=>3, "ProName"=>"Sản phẩm 3", "ProType"=>"Loại sản phẩm 3", "Price"=>50000],
                ["Id"=>4, "ProName"=>"Sản phẩm 4", "ProType"=>"Loại sản phẩm 4", "Price"=>50000],
                ["Id"=>5, "ProName"=>"Sản phẩm 5", "ProType"=>"Loại sản phẩm 1", "Price"=>50000],
                ["Id"=>6, "ProName"=>"Sản phẩm 6", "ProType"=>"Loại sản phẩm 2", "Price"=>50000],
                ["Id"=>7, "ProName"=>"Sản phẩm 7", "ProType"=>"Loại sản phẩm 3", "Price"=>50000],
                ["Id"=>8, "ProName"=>"Sản phẩm 8", "ProType"=>"Loại sản phẩm 4", "Price"=>50000],
            ]
            ];
        return view('table',$sp);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
