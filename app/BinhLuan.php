<?php

namespace news_app;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BinhLuan extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'nguoi_dang', 'noi_dung', 'thuoc_ve_bai_viet',
    ];
    public function TacGia(){
        return $this->belongsTo('news_app\User', 'nguoi_dang', 'id');
    }
    public function BaiViet(){
        return $this->belongsTo('news_app\BaiViet', 'thuoc_ve_bai_viet', 'id');
    }
}
