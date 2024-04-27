<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['total','order_lists_id'];

    public function OrderList(){
        return $this->belongsTo(OrderList::class);
    }
}
