<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'company_id', 'email', 'phone', 'employee_image',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
