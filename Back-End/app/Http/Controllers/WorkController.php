<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use Auth;
use DB;
use App\Http\Resources\WorkResource;
use App\Http\Requests\WorkRequest;

class WorkController extends Controller
{

    //---------------CRUD-------------//
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

  //--------------------------------------------------------//


  //O usuário logado cria uma vaga em um projeto seu selecionado.
  public function newWork($id, WorkRequest $request){
    $user = Auth::user();
    $userProjects = $user->projects()->get();
    foreach($userProjects as $project){
      if($project->id == $id){
        $work = new Work;
        $work->duty = $request->duty;
        $work->user_id = $request->user_id;
        $work->project_id = $id;
        $work->save();
        return new WorkResource($work);
      }
      return response()->json("Você não possui esse projeto.");
    }
  }

  //Mostra para o usuário logado as vagas de um projeto seu selecionado.
  public function listWorks($id){
    $user = Auth::user();
    $userProjects = $user->projects()->get();
    foreach($userProjects as $project){
      if($project->id == $id){
        return $project->works()->get();
      }
    }
    return response()->json("Projeto inexistente.");
  }

  //Edita as informações de uma vaga selecionada de um projeto seu selecionado.
  public function editWork(WorkRequest $request, $idProject, $idWork){
    $user = Auth::user();
    $userProjects = $user->projects()->get();
    foreach($userProjects as $project){
      if($project->id == $idProject){
        $works = $project->works()->get();
        foreach($works as $work){
          if($work->id == $idWork){
            $work->changeWork($request);
            return new WorkResource($work);
          }
        }
        return response()->json("Vaga não encontrada.");
      }
    }
    return response()->json("Projeto não encontrado.");
  }

  //Usuário logado deleta uma vaga selecionada de um projeto selecionado.
  public function deleteWork($idProject, $idWork){
    $user = Auth::user();
    $userProjects = $user->projects()->get();
    foreach($userProjects as $project){
      if($project->id == $idProject){
        $works = $project->works()->get();
        foreach($works as $work){
          if($work->id == $idWork){
            Work::destroy($idWork);
            return response()->json("A vaga para $work->duty do projeto $project->name foi deletada com sucesso!");
          }
        }
        return response()->json("Vaga não encontrada.");
      }
    }
    return response()->json("Projeto não encontrado.");
  }
}
