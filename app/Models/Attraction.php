<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category_attraction_id',	'photo'];

    public function CategoriAttraction(){
        return $this->belongsTo(CategoryAttraction::class);
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }
}
