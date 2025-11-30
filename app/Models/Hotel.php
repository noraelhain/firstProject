<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
  /**
   * The attributes that are mass assignable.
   */

    protected $fillable=[
        'name',
        'city',
        'description',
        'address',
        'category_id'
    ];

    public function catergory(){
        return $this->belongsTo(Category::class);
    }
}
