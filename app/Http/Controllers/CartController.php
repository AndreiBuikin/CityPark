<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
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

    public function update(CartUpdateRequest $request){
        $userId = Auth::id();
        $cart = Cart::where('user_id', $userId)->first();
        $price = $cart->total;
        $total = $price * $request->input('quantity');
        $souvenir = $cart->souvenir_id;

        $cart->update([
            'quantity' => $request->input('quantity'),
            'total' => $total,
            'souvenir_id' => $souvenir,
            'user_id' => $userId,
        ]);

        return $cart;
    }

    public function delete(){
        $userId = Auth::id();
        $cart = Cart::where('user_id', $userId)->first();

        if (!$cart) {
            throw new ApiException(404, 'Not Found');
        }

        $cart->delete();
        return response()->json('Удалено')->setStatusCode(410,'Gone');
    }

    public function show($id){
        $cart = Cart::where('user_id',$id)->first();
        return response()->json($cart)->setStatusCode(200);
    }
    public function allShow(){
        $cart = Cart::all();
        return response()->json($cart)->setStatusCode(200);
    }
}
