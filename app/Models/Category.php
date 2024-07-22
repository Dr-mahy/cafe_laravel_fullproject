<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Beverage;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
    'category',
    ];
    public function beverages(){
        return $this->hasmany(Beverage::class);
    }
}
