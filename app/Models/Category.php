<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    // public function hotels()
    // {
    //     return $this->hasMany(Hotel::class);
    // }
}
