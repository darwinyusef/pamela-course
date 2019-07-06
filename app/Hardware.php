<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hardware extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',	'serial',	'processor', 'ram',	'dd',	'ip',	'brand'
    ];
}
