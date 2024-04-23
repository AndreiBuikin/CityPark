<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAttraction extends Model
{
    use HasFactory;

    protected $fillable = ['name','code'];

    public function attractions(){
        return $this->hasMany(Attraction::class);
    }
}
