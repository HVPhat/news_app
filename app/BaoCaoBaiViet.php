<?php

namespace news_app;

use Illuminate\Database\Eloquent\Model;

class BaoCaoBaiViet extends Model
{
    //
    
    use SoftDeletes;
    protected $fillable = [
        'nguoi_dung', 'bai_viet', 'noi_dung', 'trang_thai'
    ];
}
