<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Specialitem;

class Beverage extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'content',
        'price',
        'published',
        'special',
        'img',
        'category_id',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function specialitem(){
        return $this->hasOne(Specialitem::class,'beverage_id');
    }
}
