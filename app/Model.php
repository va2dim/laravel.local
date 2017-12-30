<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    //protected $fillable = ['title', 'body']; // Acceptable fields,
    // разрешить массовое назначение всем атрибутам
    protected $guarded = []; //unacceptable fields
}
