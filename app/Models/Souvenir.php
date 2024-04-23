<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souvenir extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'category_souvenir_id', 'photo'];

    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function categorySouvenir(){
        return $this->belongsTo(CategorySouvenir::class);
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }
}
