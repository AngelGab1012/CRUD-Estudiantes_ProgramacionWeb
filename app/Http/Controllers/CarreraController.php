<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;

class CarreraController extends Controller
{
    public function index(){
        $title = "Carreras";
        $carreras = Carrera::all();
        return view('carreras.index', compact('carreras', 'title'));
    }

    public function create(){
        $title = "Agregar Carrera";
        return view('carreras.create', compact('title'));
    }

    public function store(Request $request){
        $request->validate([
            'nombre'=>'required|string|max:255'
        ],
        [
            'nombre.required'=>'El nombre de la carrera es obligatorio',
            'nombre.string'=>'El nombre de la carrera debe de ser texto',
            'nombre.max'=>'El numero de caracteres permitido es 225'
        ]);

        $carrera = new Carrera();
        $carrera->nombre = $request->nombre;
        $carrera->save();

        return redirect()->route('carrera.index')->with('success', 'La carrera se guardo correctamente');
    }

    public function edit($id){
        $carrera = Carrera::findOrFail($id);
        $title = "Editar Carrera";
        return view('carreras.edit', compact('carrera', 'title'));
    }

    public function update($id, Request $request){
        $request->validate([
            'nombre'=>'required|string|max:255'
        ],
        [
            'nombre.required'=>'El nombre de la carrera es obligatorio',
            'nombre.string'=>'El nombre de la carrera debe de ser texto',
            'nombre.max'=>'El numero de caracteres permitido es 225'
        ]);

        $carrera = Carrera::findOrFail($id);
        $carrera->nombre = $request->nombre;
        $carrera->save();

        return redirect()->route('carrera.index')->with('success', 'La carrera se actualizo correctamente');
    }

    public function delete($id){
        $carrera = Carrera::findOrFail($id);
        $carrera->delete();
        sleep(3);

        return redirect()->back();
    }
}

