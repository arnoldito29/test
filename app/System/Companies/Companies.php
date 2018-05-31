<?php

namespace App\System\Companies;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = [
        'name',
        'website',
        'email',
        'logo',
    ];
}
