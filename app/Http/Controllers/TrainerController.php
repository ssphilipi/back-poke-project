<?php

namespace App\Http\Controllers;

use Auth;
use App\Trainer;
use Illuminate\Http\Request;
use App\Http\Resources\TrainerResource as TrainerResource;
use App\Http\Requests\StoreTrainer;
use App\Http\Requests\UpdateTrainer;
use Illuminate\Support\Facades\Validator;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return TrainerResource::collection(Trainer::where('user_id', '=', $user->id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainer $request)
    {
        $newTrainer = new Trainer;
        $user = Auth::user();

        $newTrainer->nome = $request->nome;
        $newTrainer->pokemon = $request->pokemon;
        $newTrainer->codigo = $request->codigo;
        $newTrainer->user_id = $user->id;

        $newTrainer->save();

        return new TrainerResource($newTrainer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        $user = Auth::user();
        if ($trainer->user_id == $user->id)
        {
          return new TrainerResource($trainer);
        }
        else return response()->json('Você não poder ver os pokémons dos outros! >:(');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainer $request, Trainer $trainer)
    {
        $user = Auth::user();
        if ($trainer->user_id == $user->id)
        {
          if ($request->nome) {
            $trainer->nome = $request->nome;
          }
          if ($request->pokemon) {
            $trainer->pokemon = $request->pokemon;
          }
          if ($request->codigo) {
            $trainer->codigo = $request->codigo;
          }
          $trainer->save();
          return new TrainerResource($trainer);
        }
        else return response()->json('Você não poder alterar os pokémons dos outros! >:(');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        $user = Auth::user();
        if ($trainer->user_id == $user->id)
        {
          Trainer::destroy($trainer->id);
          return response()->json('Teinador deletado com sucesso!');
        }
        else return response()->json('Você não poder deletar os pokémons dos outros! >:(');
    }
}
