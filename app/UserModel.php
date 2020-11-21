<?php

namespace news_app;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //
    protected $table='users';
    protected $fillable =[
        'name',
        'email',
        'phone',
        'password',
    ];
}
