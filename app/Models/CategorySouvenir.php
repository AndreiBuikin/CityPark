<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySouvenir extends Model
{
    use HasFactory;

    protected $fillable = ['name','code'];

    public function souvenirs(){
        return $this->hasMany(Souvenir::class);
    }
}
