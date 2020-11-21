<?php

namespace news_app;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'nguoi_dang', 'noi_dung', 'thuoc_ve_bai_viet',
    ];
}
