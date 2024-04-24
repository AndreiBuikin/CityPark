<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(UserUpdateRequest $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        return response()->json($user)->setStatusCode(201,'Created');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return response()->json('Удалено')->setStatusCode(410,'Gone');
    }

    public function show($id){
        $user = User::find($id);
        return response()->json($user)->setStatusCode(200,'Ok');
    }

}
