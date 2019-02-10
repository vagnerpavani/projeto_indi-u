<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Resources\ProjectResource;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
  public function index(){
      return ProjectResource::collection(Project::all());
  }

  public function store(ProjectRequest $request){
      $project = new Project;
      $project->newProject($request);
      return new ProjectResource($project);
  }

  public function show($id){
      $project = Project::findOrFail($id);
      return new ProjectResource($project);
  }

  public function update(ProjectRequest $request, $id){
      $project = Project::findOrFail($id);
      $project->changeProject($request);
      return new ProjectResource($project);
  }

  public function destroy($id){
    $project = Project::findOrFail($id);
    Project::destroy($id);
    return response()->json("O projeto $project->name foi deletado com sucesso!");
  }
}
