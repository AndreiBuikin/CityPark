<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\AttractionCreateRequest;
use App\Http\Requests\AttractionUpdateRequest;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Attraction;
use App\Models\CategoryAttraction;
use App\Models\CategorySouvenir;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class AttractionController extends Controller
{
    public function createCategory(CategoryCreateRequest $request){
        $category = new CategoryAttraction($request->all());
        $category->save();
        return response()->json($category)->setStatusCode(201,'Created');
    }
    public function updateCategory(CategoryUpdateRequest $request, $id){
        $category = CategoryAttraction::find($id);

        if (!$category) {
            throw new ApiException(404, 'Not Found');
        }

        $category->update($request->all());
        return response()->json($category)->setStatusCode(200,'Ok');
    }
    public function deleteCategory($id){
        $category = CategoryAttraction::find($id);

        if (!$category) {
            throw new ApiException(404, 'Not Found');
        }

        $category->delete();
        return response()->json('Удалено')->setStatusCode(410,'Gone');
    }



    public function createAttraction(AttractionCreateRequest $request){

        $photo = $request->file('photo')->storeAs('uploads/attraction', $request->file('photo')->getClientOriginalName(), 'public');

        $attraction = new Attraction([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category_attraction_id' => $request->input('category_attraction_id'),
            'photo' => $photo,
        ]);
        $attraction->save();
        return response()->json($attraction)->setStatusCode(201,'Created');
    }

    public function updateAttraction(AttractionUpdateRequest $request, $id){
        $attraction = Attraction::find($id);

        if (!$attraction) {
            throw new ApiException(404, 'Not Found');
        }

        $attraction->update($request->all());
        return response()->json($attraction)->setStatusCode(200,'Ok');
    }
    public function deleteAttraction($id){
        $attraction = Attraction::find($id);

        if (!$attraction) {
            throw new ApiException(404, 'Not Found');
        }

        $attraction->delete();
        return response()->json('Удалено')->setStatusCode(410,'Gone');
    }


    public function showCategoryAttractions(){
        $categories = CategoryAttraction::all();
        return response()->json($categories)->setStatusCode(200,'Ok');
    }
    public function showCategoryAttraction($id){
        $category = CategoryAttraction::find($id);
        if (!$category) {
            throw new ApiException(404, 'Not Found');
        }
        return response()->json($category)->setStatusCode(200,'Ok');
    }



    public function attractions(){
        $attraction = Attraction::all();
        return response()->json($attraction)->setStatusCode(200,'Ok');
    }

    public function attraction($id){
        $attraction = Attraction::find($id);
        if (!$attraction) {
            throw new ApiException(404, 'Not Found');
        }
        return response()->json($attraction)->setStatusCode(200,'Ok');
    }
}
