<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    public function users(){
        return $this->hasMany(User::class);
    }

    public function attractions(){
        return $this->hasMany(Attraction::class);
    }
    public function souvenirs(){
        return $this->hasMany(Souvenir::class);
    }
    public function ne_w(){
        return $this->hasMany(Ne_w::class);
    }
}
