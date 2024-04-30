<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(UserUpdateRequest $request, $id){

        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Photo not found'], 404);
        }

        $user->name = $request->input('name', $user->name);
        $user->surname = $request->input('surname', $user->surname);
        $user->patronymic = $request->input('patronymic', $user->patronymic);
        $user->password = $request->input('password', $user->password);
        $user->login = $request->input('login', $user->login);
        $user->photo = $request->input('photo', $user->photo);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->storeAs('uploads/user', $request->file('photo')->getClientOriginalName(), 'public');
            $user->photo = $photo;
        }

        $user->save();
        return response()->json($user)->setStatusCode(200);
    }

    public function delete($id){
        $user = User::find($id);

        if (!$user) {
            throw new ApiException(404, 'Not Found');
        }
        $user->delete();
        return response()->json('Удалено')->setStatusCode(410,'Gone');
    }

    public function show($id){
        $user = User::find($id);
        if (!$user) {
            throw new ApiException(404, 'Not Found');
        }
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
