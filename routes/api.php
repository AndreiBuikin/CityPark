<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\SouvenirController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\TicketController;

Route::post('/reg',[AuthController::class,'create']);
Route::post('/login',[AuthController::class,'login']);

//Просмотры
//Категории аттракционов
Route::get('/showCategoryAttractions',[AttractionController::class,'showCategoryAttractions']);
Route::get('/showCategoryAttraction/{id}',[AttractionController::class,'showCategoryAttraction']);
//Аттракционы
Route::get('/attractions',[AttractionController::class,'attractions']);
Route::get('/attraction/{id}',[AttractionController::class,'attraction']);


//Категории сувениров
Route::get('/showCategorySouvenirs',[AttractionController::class,'showCategorySouvenirs']);
Route::get('/showCategorySouvenir/{id}',[AttractionController::class,'showCategorySouvenir']);
//Сувениры
Route::get('/souvenirs',[SouvenirController::class,'souvenirs']);
Route::get('/souvenir/{id}',[SouvenirController::class,'souvenir']);


//Типы билетов
Route::get('/typeTickets',[TicketController::class,'typeTickets']);
Route::get('/typeTicket/{id}',[TicketController::class,'typeTicket']);



Route::middleware('auth:api')->group(function (){
    Route::get('/logout',[AuthController::class,'logout']);

    //Профиль
    //Просмотр
    Route::get('/user/show/{id}',[UserController::class,'show']);
    //Редактирование
    Route::post('/user/update/{id}',[UserController::class,'update']);
    //Удаление
    Route::delete('/user/delete/{id}',[UserController::class,'delete']);
});

Route::middleware(['auth:api','role:admin'])->group(function (){

    //Добавление
    Route::post('/category/addAttraction',[AttractionController::class,'createCategory']);
    //Редактирование
    Route::post('/category/updateAttraction/{id}',[AttractionController::class,'updateCategory']);
    //Удаление
    Route::delete('/category/deleteAttraction/{id}',[AttractionController::class,'deleteCategory']);

    //Добавление
    Route::post('/addAttraction',[AttractionController::class,'createAttraction']);
    //Редактирование
    Route::post('/updateAttraction/{id}',[AttractionController::class,'updateAttraction']);
    //Удаление
    Route::delete('/deleteAttraction/{id}',[AttractionController::class,'deleteAttraction']);

    //Доступ к просмотру популярного тарифа.
    //Информация о доходе за определенный период времени.

    //Добавление
    Route::post('/addTypeTicket',[TicketController::class,'createType']);
    //Редактирование
    Route::post('/updateTypeTicket/{id}',[TicketController::class,'updateType']);
    //Удаление
    Route::delete('/deleteTypeTicket/{id}',[TicketController::class,'deleteType']);

    //Добавление билета
    Route::post('/addTicket',[TicketController::class,'createTicket']);
});

Route::middleware(['auth:api','role:manager'])->group(function (){

    //Добавление
    Route::post('/category/addSouvenir',[SouvenirController::class,'createCategory']);
    //Редактирование
    Route::post('/category/updateSouvenir/{id}',[SouvenirController::class,'updateCategory']);
    //Удаление
    Route::delete('/category/deleteSouvenir/{id}',[SouvenirController::class,'deleteCategory']);

    //Добавление
    Route::post('/addSouvenir',[SouvenirController::class,'createSouvenir']);
    //Редактирование
    Route::post('/updateSouvenir/{id}',[SouvenirController::class,'updateSouvenir']);
    //Удаление
    Route::delete('/deleteSouvenir/{id}',[SouvenirController::class,'deleteSouvenir']);
});

Route::middleware(['auth:api','role:editor'])->group(function (){

    //Добавление
    Route::post('/news',[NewController::class,'create']);
    //Редактирование
    Route::post('/news/{id}',[NewController::class,'update']);
    //Удаление
    Route::delete('/news/{id}',[NewController::class,'delete']);
});
