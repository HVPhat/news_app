<?php

namespace news_app;

use Illuminate\Database\Eloquent\Model;

class BaoCaoBinhLuan extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'nguoi_dung', 'binh_luan', 'trang_thai',
    ];
}
