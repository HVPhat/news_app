<?php

namespace news_app;

use Illuminate\Database\Eloquent\Model;

class ChuDe extends Model
{
    //
    
    use SoftDeletes;
    protected $fillable = [
        'ten_chu_de',
    ];
}
