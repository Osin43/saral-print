<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon_code extends Model
{
    use HasFactory;
    protected $fillable=[
        'coupon_code', 'value','type','status','product','shipping',
    ];
}
