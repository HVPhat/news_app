<?php

namespace news_app\Http\Controllers;

use news_app\BaiViet;
use news_app\ChuDe;
use news_app\User;
use Illuminate\Http\Request;
use DB;
use news_app\Http\Requests\BaiVietFormSubmit;


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
        /*$bai_viets=DB::table('bai_viets')
                    ->join('users','users.id','=','bai_viets.tac_gia')
                    ->join('chu_des','chu_des.id','=','bai_viets.chu_de')
                    ->select('bai_viets.*','users.name as ten_tac_gia', 'chu_des.ten_chu_de')->get();*/
        $bai_viets=BaiViet::all();
        return view('bai_viet\post', ['bai_viets'=>$bai_viets]);
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
        $User=User::all();
        return view('bai_viet\add_post',['chuDe'=>$chuDe], ['User'=>$User]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BaiVietFormSubmit $request)
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
            'tac_gia'=>$request['tac_gia']
        ]);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \news_app\BaiViet  $baiViet
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
     * @param  \news_app\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $bai_viets=BaiViet::find($id);
        $chuDe=ChuDe::all();
        $User=User::all();
        return view('bai_viet\edit_post', $bai_viets,['chuDe'=>$chuDe,'User'=>$User]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \news_app\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function update(BaiVietFormSubmit $request, $id)
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
        $bai_viets->noi_dung=$request['noi_dung'];
        $bai_viets->hinh_anh=$filenameToStore;
        $bai_viets->tac_gia=$request['tac_gia'];
        $bai_viets->save();
        return redirect()->route('post.index');
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
        return redirect()->route('post.index');
    }
    public function approval($id)
    {
        //
        $bai_viet=BaiViet::find($id);
        $bai_viet->da_duyet = 1;
        $bai_viet->nguoi_duyet = auth()->user()->id;
        $bai_viet->save();
        return redirect()->route('post.index');
    }
}
