<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upt extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function upt_organizational_structures()
    {
        return $this->hasMany('App\Models\UptOrganizationalStructure');
    }
}
