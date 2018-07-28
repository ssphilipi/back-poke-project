<?php

namespace App\Http\Controllers;

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
        return TrainerResource::collection(Trainer::all());
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

        $newTrainer->nome = $request->nome;
        $newTrainer->pokemon = $request->pokemon;
        $newTrainer->codigo = $request->codigo;

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
        return new TrainerResource($trainer);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        Trainer::destroy($trainer->id);
        return response()->json('Teinador deletado com sucesso!');
    }
}
