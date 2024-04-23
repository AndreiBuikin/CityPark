<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\SouvenirController;
use App\Http\Controllers\NewController;

Route::post('/reg',[AuthController::class,'create']);
Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:api')->group(function (){
    Route::get('/logout',[AuthController::class,'logout']);

    Route::post('/user/update',[UserController::class,'update']);
    Route::delete('/user/delete',[UserController::class,'delete']);
});

Route::middleware(['auth:api','role:admin'])->group(function (){

    Route::post('/category/addAttraction',[AttractionController::class,'createCategory']);
    Route::post('/category/updateAttraction/{id}',[AttractionController::class,'updateCategory']);
    Route::delete('/category/deleteAttraction/{id}',[AttractionController::class,'deleteCategory']);

    Route::post('/addAttraction',[AttractionController::class,'createAttraction']);
    Route::post('/updateAttraction/{id}',[AttractionController::class,'updateAttraction']);
    Route::delete('/deleteAttraction/{id}',[AttractionController::class,'deleteAttraction']);

    //Доступ к просмотру популярного тарифа.
    //Информация о доходе за определенный период времени.
});

Route::middleware(['auth:api','role:manager'])->group(function (){

    Route::post('/category/addSouvenir',[SouvenirController::class,'createCategory']);
    Route::post('/category/updateSouvenir/{id}',[SouvenirController::class,'updateCategory']);
    Route::delete('/category/deleteSouvenir/{id}',[SouvenirController::class,'deleteCategory']);

    Route::post('/addSouvenir',[SouvenirController::class,'createSouvenir']);
    Route::post('/updateSouvenir/{id}',[SouvenirController::class,'updateSouvenir']);
    Route::delete('/deleteSouvenir/{id}',[SouvenirController::class,'deleteSouvenir']);
});

Route::middleware(['auth:api','role:editor'])->group(function (){

    Route::post('/news',[NewController::class,'create']);
    Route::post('/news/{id}',[NewController::class,'update']);
    Route::delete('/news/{id}',[NewController::class,'delete']);
});
