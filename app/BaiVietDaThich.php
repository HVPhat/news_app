<?php

namespace news_app;

use Illuminate\Database\Eloquent\Model;

class BaiVietDaThich extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'nguoi_dung', 'bai_viet',
    ];
}
