<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['name','desc','title','image','price','category_id'];

    public function categories()
    {
        //
        return $this->belongsTo(Category::class, 'parent_id');
    }
    
}