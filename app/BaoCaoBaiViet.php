<?php

namespace news_app;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaoCaoBaiViet extends Model
{
    //
    
    use SoftDeletes;
    protected $fillable = [
        'nguoi_dung', 'bai_viet', 'noi_dung', 'trang_thai'
    ];
    
    public function NguoiBaoCao(){
        return $this->belongsTo('news_app\User','nguoi_dung','id');
    }

    public function BaiViet(){
        return $this->belongsTo('news_app\BaiViet','bai_viet','id');
    }
}
