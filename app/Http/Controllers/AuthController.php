<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserCreateRequest;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create(UserCreateRequest $request){
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->storeAs('uploads/user', $request->file('photo')->getClientOriginalName(), 'public');
        } else {
            $photo = null;
        }

        $user = new User([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'patronymic' => $request->input('patronymic'),
            'password' => $request->input('password'),
            'login' => $request->input('login'),
            'photo' => $photo,
            'role_id' => $request->input('role_id')
        ]);

        $user->save();

        return response('Регистрация прошла успешно')->setStatusCode(201,'Created');
    }
    public function login(LoginRequest $request){
        $user = User::where('login', $request->login)
            ->where('password', $request->password)
            ->first();

        if (!$user) {
            throw new ApiException(401, 'Authentication failed');
        }
        $newToken = Hash::make(microtime(true) * 1000);
        $user->token = $newToken;
        $user->save();

        return response()->json($user->token)->setStatusCode(202,'Accepted');
    }

    public function logout(Request $request){
        $user = $request->user();
        if (!$user) {
            throw new ApiException(401, 'Unauthorized');
        }
        $user->token = null;
        $user->save();
        return response()->json('Вы успешно вышли из аккаунта')->setStatusCode(202, 'Accepted');
    }
}
