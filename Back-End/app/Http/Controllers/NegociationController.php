<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Negociation;
use App\User;
use Auth;
use App\Http\Requests\NegociationRequest;

class NegociationController extends Controller
{
    public function deposit(NegociationRequest $request){
      $user_deposit = Auth::user();

      $user_deposit->balance += $request->value;

      $user_deposit->save();

      return response()->json('Depositado com sucesso.');
    }

    public function transfer(NegociationRequest $request){
      $user_deposit = Auth::user();

      if($request->id_user_receive){
        $user_receive = User::findOrFail($request->id_user_receive);

        if($request->value > $user_deposit->balance){
          return response()->json('Você não possui saldo suficiente.');
        }

        $user_deposit->balance -= $request->value;
        $user_receive->balance += $request->value;

        $user_deposit->save();
        $user_receive->save();
        return response()->json('Valor transferido com sucesso.');
      }
      return response()->json('Esse usuário não existe.');
    }
}
