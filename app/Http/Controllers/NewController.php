<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\NewCreateRequest;
use App\Http\Requests\NewUpdateRequest;
use App\Models\Ne_w;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NewController extends Controller
{
    public function create(NewCreateRequest $request){
        $photo = $request->file('photo')->storeAs('uploads/new', $request->file('photo')->getClientOriginalName(), 'public');
        $currentDateTime = Carbon::now()->format('Y-m-d H:i:s');

        $new = new Ne_w([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'photo' => $photo,
        ]);
        $new->datetime = $currentDateTime;
        $new->save();
        return response()->json($new)->setStatusCode(201,'Created');
    }
    public function update(NewUpdateRequest $request, $id){
        $new = Ne_w::find($id);

        if (!$new) {
            throw new ApiException(404, 'Not Found');
        }

        $new->update($request->all());
        return response()->json($new)->setStatusCode(200,'Ok');
    }
    public function delete($id){
        $new = Ne_w::find($id);

        if (!$new) {
            throw new ApiException(404, 'Not Found');
        }

        $new->delete();
        return response()->json('Удалено')->setStatusCode(410,'Gone');
    }
}
