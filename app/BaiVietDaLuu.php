<?php

namespace news_app;

use Illuminate\Database\Eloquent\Model;

class BaiVietDaLuu extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'nguoi_dung', 'bai_viet',
    ];
}
