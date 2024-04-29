<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\PhotoCreateRequest;
use App\Http\Requests\PhotoUpdateRequest;
use App\Models\Ne_w;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function create(PhotoCreateRequest $request){

        $path = $request->file('path')->storeAs('uploads/news', $request->file('path')->getClientOriginalName(), 'public');

        $new = new Photo([
            'name' => $request->input('name'),
            'path' => $path,
        ]);

        $new->save();
        return response()->json($new)->setStatusCode(201,'Created');
    }

    public function update(PhotoUpdateRequest $request, $id){
        $photo = Photo::find($id);

        if (!$photo) {
            return response()->json(['message' => 'Photo not found'], 404);
        }

        $photo->name = $request->input('name', $photo->name);
        $photo->path = $request->input('path', $photo->path);

        if ($request->hasFile('path')) {
            $path = $request->file('path')->storeAs('uploads/news', $request->file('path')->getClientOriginalName(), 'public');
            $photo->path = $path;
        }

        $photo->save();
        return response()->json($photo)->setStatusCode(200);
    }

    public function delete($id){
        $photo = Photo::find($id);

        if (!$photo) {
            throw new ApiException(404, 'Not Found');
        }

        $photo->delete();
        return response()->json('Удалено')->setStatusCode(410,'Gone');
    }
}
