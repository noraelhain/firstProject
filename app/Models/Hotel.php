<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'city',
        'description',
        'address',
        'category_id',
        'price',
        'discount_value',
        'user_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile(); 
    }

 public function getCoverUrlAttribute(): ?string{
    $cover = $this->getFirstMedia('cover');
    return $cover ? $cover->getUrl() : null;
}

public function calcDiscount(){
    return $this->price-($this->price * $this->discount_value /100);
}
}