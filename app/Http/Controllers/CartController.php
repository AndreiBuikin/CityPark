<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartCreateRequest;
use App\Http\Requests\CartUpdateRequest;
use App\Models\Cart;
use App\Models\Souvenir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(CartCreateRequest $request){
        $userId = Auth::id();

        $souvenir = Souvenir::where('id', $request->input('souvenir_id'))->first();
        $total = $souvenir->price * $request->input('quantity');

       $cart = new Cart([
            'quantity' => $request->input('quantity'),
            'total' => $total,
            'souvenir_id' => $request->input('souvenir_id'),
            'user_id' => $userId,
        ]);

       $cart->save();

       return $cart;
    }

    public function update(CartUpdateRequest $request, $id){
        $cart = Cart::find($id);
        $cart->update($request->all());

        return $cart;
    }
}
/*$user = Souvenir::find($id);
$user->update($request->all());
return response()->json($user)->setStatusCode(201,'Created');*/
