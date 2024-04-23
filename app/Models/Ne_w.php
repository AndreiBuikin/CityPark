<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ne_w extends Model
{
    use HasFactory;

    protected $fillable = ['title',	'content',	'datetime',	'photo'];

    public function photo(){
        return $this->belongsTo(Photo::class);
    }
}
