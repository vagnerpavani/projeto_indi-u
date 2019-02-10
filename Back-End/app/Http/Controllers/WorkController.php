<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\Http\Resources\WorkResource;
use App\Http\Requests\WorkRequest;

class WorkController extends Controller
{
  public function index(){
      return WorkResource::collection(Work::all());
  }

  public function store(WorkRequest $request){
      $work = new Work;
      $work->newWork($request);
      return new WorkResource($work);
  }

  public function show($id){
      $work = Work::findOrFail($id);
      return new WorkResource($work);
  }

  public function update(WorkRequest $request, $id){
      $work = Work::findOrFail($id);
      $work->changeWork($request);
      return new WorkResource($work);
  }

  public function destroy($id){
    $work = Work::findOrFail($id);
    Work::destroy($id);
    return response()->json("A vaga de $work->duty do projeto $work->project_id foi deletada com sucesso!");
  }
}
