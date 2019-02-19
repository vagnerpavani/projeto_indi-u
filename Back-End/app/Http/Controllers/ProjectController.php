<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use Auth;
use DB;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Storage;
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

  public function createProject(ProjectRequest $request){
    $user = Auth::user();
    $project = new Project;
    $project->name = $request->name;
    $project->description = $request->description;
    $project->user_id = $user->id;

    if($request->picture){
        $project->picture = $request->picture;
        $file = $request->file('picture');
        $filename = 'pic.'.$file->getClientOriginalExtension();

        if (!Storage::exists('localPhotos/')){
            Storage::makeDirectory('localPhotos/',0775,true);
        }

        $path = $file->storeAs('localPhotos', $filename);
        $project->picture = $path;
    }

    $project->save();
    return new ProjectResource($project);
  }

  public function listProjects(){
    $user = Auth::user();
    return $user->projects()->get();
  }

  public function deleteProject($id){
    $user = Auth::user();
    $projects = $user->projects()->get();

    foreach($projects as $project){
      if($project->id == $id){
        Project::destroy($id);
        return response()->json("O projeto $project->name foi deletado com sucesso!");
      }
    }
    return response()->json("Projeto não encontrado!");
  }

  public function editProject($id, ProjectRequest $request){
    $user = Auth::user();
    $projects = $user->projects()->get();

    foreach($projects as $project){
      if($project->id == $id){
        $project->changeProject($request);
        return response()->json("O projeto $project->name foi editado com sucesso!");
      }
    }
    return response()->json("Projeto não encontrado!");
  }

  public function downloadProjectPic($id){
    $project = Project::findOrFail($id);
    return response()->download(storage_path('app/'.$project->picture));
    }
}
