<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;
use App\Http\Resources\PictureResource;
use App\Http\Requests\PictureRequest;

class PictureController extends Controller
{
  public function index(){
      return PictureResource::collection(Picture::all());
  }

  public function store(PictureRequest $request){
      $picture = new Picture;
      $picture->newPicture($request);
      return new PictureResource($picture);
  }

  public function show($id){
      $picture = Picture::findOrFail($id);
      return new PictureResource($picture);
  }

  public function update(PictureRequest $request, $id){
      $picture = Picture::findOrFail($id);
      $picture->changePicture($request);
      return new PictureResource($picture);
  }

  public function destroy($id){
    $picture = Picture::findOrFail($id);
    Picture::destroy($id);
    return response()->json("A foto foi deletada com sucesso!");
  }
}
