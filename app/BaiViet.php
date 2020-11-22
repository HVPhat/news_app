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

}
