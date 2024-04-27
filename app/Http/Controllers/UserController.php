<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
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


        public function full(Request $request) {

            $user = $request->user();

            if ($user) {
                $fullname = $user->surname . ' ' . $user->name;

                return $fullname;
            } else {
                return 'User not found';
            }
        }

    public function getRole(Request $request) {
        // Получаем аутентифицированного пользователя, используя токен доступа
        $user = $request->user();

        if ($user) {
            // Получаем роль пользователя
            $role = $user->role->name;

            return $role;
        } else {
            return 'Пользователь не найден';
        }
    }

    public function showUsers(){
        return User::all();
    }
    public function showRole(){
        return Role::all();
    }

}
