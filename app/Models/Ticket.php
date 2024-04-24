<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['total', 'datetimeStart', 'datetimeEnd', 'type_tickets_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function TypeTicket(){
        return $this->belongsTo(TypeTicket::class);
    }
    public function OrderLists(){
        return $this->hasMany(OrderList::class);
    }
}
