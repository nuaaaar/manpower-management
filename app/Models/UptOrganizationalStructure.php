<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UptOrganizationalStructure extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function upt()
    {
        return $this->belongsTo('App\Models\Upt');
    }
}
