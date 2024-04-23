<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['name','surname','patronymic','password','login','role_id','photo'];


    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    public function orderlists(){
        return $this->hasMany(OrderList::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public  function hasRole($roles){
        return in_array($this->role->code, $roles);
    }
}
