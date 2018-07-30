<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource as UserResource;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return userResource::collection(User::all());
    }

    public function show(User $user)
    {
        $user_log = Auth::user();
        if ($user->id == $user_log->id)
        {
          return new UserResource($user);
        }
        else return response()->json('Você não poder ver os pokémons dos outros! >:(');
    }

    public function update(UpdateUser $request, User $user)
    {
        $user_log = Auth::user();
        if ($user->id == $user_log->id)
        {
          if ($request->name) {
            $user->name = $request->name;
          }
          if ($request->email) {
            $user->email = $request->email;
          }
          if ($request->pokemon) {
            $user->pokemon = $request->pokemon;
          }
          if ($request->codigo) {
            $user->codigo = $request->codigo;
          }
          $user->save();
          return new UserResource($user);
        }
        else return response()->json('Você não poder alterar os pokémons dos outros! >:(');
    }


    public function destroy(User $user)
    {
        $user_log = Auth::user();
        if ($user->id == $user_log->id)
        {
          User::destroy($user->id);
          return response()->json('Teinador deletado com sucesso!');
        }
        else return response()->json('Você não poder deletar os pokémons dos outros! >:(');
    }
}
