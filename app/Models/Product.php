<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'desc',
        'category_id',
        'size',
        'paperWeight',
        'lamination',
        'weight',
        'discount'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}