<?php

namespace App\System\Employees;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'phone',
        'email',
    ];
    
    public function Companies()
    {
        return $this->hasOne('App\System\Companies\Companies', 'id', 'company_id');
    }
}
