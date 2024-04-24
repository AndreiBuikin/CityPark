<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Requests\SouvenirCreateRequest;
use App\Http\Requests\SouvenirUpdateRequest;
use App\Models\CategorySouvenir;
use App\Models\Souvenir;
use Illuminate\Http\Request;

class SouvenirController extends Controller
{
    public function createCategory(CategoryCreateRequest $request){
        $category = new CategorySouvenir($request->all());
        $category->save();
        return response()->json($category)->setStatusCode(201,'Created');
    }
    public function updateCategory(CategoryUpdateRequest $request, $id){
        $category = CategorySouvenir::find($id);

        if (!$category) {
            throw new ApiException(404, 'Not Found');
        }

        $category->update($request->all());
        return response()->json($category)->setStatusCode(200,'Ok');
    }
    public function deleteCategory($id){
        $category = CategorySouvenir::find($id);

        if (!$category) {
            throw new ApiException(404, 'Not Found');
        }

        $category->delete();
        return response()->json('Удалено')->setStatusCode(410,'Gone');
    }



    public function createSouvenir(SouvenirCreateRequest $request){
        $photo = $request->file('photo')->store('uploads', 'public');

        $souvenir = new Souvenir([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'category_souvenir_id' => $request->input('category_souvenir_id'),
            'photo' => $photo,
        ]);
        $souvenir->save();
        return response()->json($souvenir)->setStatusCode(201,'Created');
    }
    public function updateSouvenir(SouvenirUpdateRequest $request, $id){
        $souvenir = Souvenir::find($id);

        if (!$souvenir) {
            throw new ApiException(404, 'Not Found');
        }

        $souvenir->update($request->all());
        return response()->json($souvenir)->setStatusCode(200,'Ok');
    }
    public function deleteSouvenir($id){
        $souvenir = Souvenir::find($id);

        if (!$souvenir) {
            throw new ApiException(404, 'Not Found');
        }

        $souvenir->delete();
        return response()->json('Удалено')->setStatusCode(410,'Gone');
    }



    public function souvenirs(){
        $souvenirs = Souvenir::all();
        return response()->json($souvenirs)->setStatusCode(200,'Ok');
    }
    public function souvenir($id){
        $souvenir = Souvenir::find($id);
        if (!$souvenir) {
            throw new ApiException(404, 'Not Found');
        }
        return response()->json($souvenir)->setStatusCode(200,'Ok');
    }
}
