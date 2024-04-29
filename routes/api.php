<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\SouvenirController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PhotoController;





Route::middleware('auth:api')->get('/full', [UserController::class, 'full']);
Route::middleware('auth:api')->get('/getRole', [UserController::class, 'getRole']);



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
Route::get('/showCategorySouvenirs',[SouvenirController::class,'showCategorySouvenirs']);
Route::get('/showCategorySouvenir/{id}',[SouvenirController::class,'showCategorySouvenir']);
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


    //Покупка билета
    Route::post('/addTicket',[TicketController::class,'createTicket']);
    //покупка сувенира
    Route::post('/purchase',[SouvenirController::class,'purchase']);


    //Корзина
    //Добовление
    Route::post('/addCart',[CartController::class,'add']);
    //Редактирование
    Route::post('/updateCart',[CartController::class,'update']);
    //Удаление
    Route::delete('/deleteCart',[CartController::class,'delete']);

});

Route::middleware(['auth:api','role:admin'])->group(function (){

    //Просмотр сотрудников
    Route::get('/users',[UserController::class,'showUsers']);
    //Просмотр ролей
    Route::get('/roles',[UserController::class,'showRole']);

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


    //Доступ к просмотру популярного тарифа
    Route::get('/popular',[TicketController::class,'popular']);
    //Информация о доходе за определенный период времени
    Route::get('/income',[TicketController::class,'income']);


    //Добавление
    Route::post('/addTypeTicket',[TicketController::class,'createType']);
    //Редактирование
    Route::post('/updateTypeTicket/{id}',[TicketController::class,'updateType']);
    //Удаление
    Route::delete('/deleteTypeTicket/{id}',[TicketController::class,'deleteType']);
});

Route::middleware(['auth:api','role:manager|admin'])->group(function (){

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

Route::middleware(['auth:api','role:editor|admin'])->group(function (){

    //Добавление
    Route::post('/news',[NewController::class,'create']);
    //Редактирование
    Route::post('/news/{id}',[NewController::class,'update']);
    //Удаление
    Route::delete('/news/{id}',[NewController::class,'delete']);

    //Добавление фотогалереи
    Route::post('/addPhoto',[PhotoController::class,'create']);
    //Редактирование
    Route::post('/updatePhoto/{id}',[PhotoController::class,'update']);
    //Удаление
    Route::delete('/deletePhoto/{id}',[PhotoController::class,'delete']);
});
