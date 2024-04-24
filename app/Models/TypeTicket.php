<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTicket extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
