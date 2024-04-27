<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'cart_id', 'ticket_id', 'user_id'];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
