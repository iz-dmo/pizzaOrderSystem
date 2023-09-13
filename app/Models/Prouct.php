<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prouct extends Model
{
    use HasFactory;
    protected $fillable=['product_id','category_id','name','description','image','price','view_count'];
}
