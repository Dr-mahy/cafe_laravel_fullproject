<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Beverage;

class Specialitem extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'content',
        'img',
        'beverage_id',
    ];
    public function beverage(){
        return $this->belongsTo(Beverage::class,'beverage_id');
    }
}
