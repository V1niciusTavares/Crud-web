<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::find(Auth::user()->id)
        ->animais()
        ->create([
            'nome'=>$request ->nome,
            'especie' => $request ->especie, 
            'idade'=>$request ->idade,
            'peso'=>$request ->peso,
            'vacina'=>$request ->vacina 
        ]);
        return redirect (route('dashboard'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $animal->nome = $request->nome;
        $animal->especie = $request->especie;
        $animal->idade = $request->idade;
        $animal->peso = $request->peso;
        $animal->vacina = $request->vacina;
        $animal->save();

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect('dashboard');
    }
}
