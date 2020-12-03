<?php

namespace news_app;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaiViet extends Model
{
    //
    
    use SoftDeletes;
    protected $fillable = [
        'chu_de', 'tieu_de', 'hinh_anh', 'noi_dung', 'tac_gia', 'nguoi_duyet', 'da_duyet'
    ];
    
    public function TacGia(){
        return $this->belongsTo('news_app\User', 'tac_gia', 'id');
    }

    public function ChuDe(){
        return $this->belongsTo('news_app\ChuDe','chu_de','id');
    }
    public function Nguoiduyet(){
        return $this->belongsTo('news_app\User','tac_gia','id');
    }
}