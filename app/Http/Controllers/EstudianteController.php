<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Carrera;

class EstudianteController extends Controller
{
    public function index(){
        $title = "Estudiantes";
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes', 'title'));
    }

    public function create(){
        $title = "Agregar Estudiante";
        $carreras =  Carrera::all();
        return view('estudiantes.create', compact('carreras', 'title'));
    }

    public function store(Request $request){
        
        $request->validate([
            'nombre'=>'required|string|max:255',
            'email'=>'required|string|max:255',
            'carrera'=>'required',
            'semestre'=>'required|numeric|min:1|max:15'
        ],
        [
            'nombre.required'=>'El nombre del estudiante es obligatorio',
            'nombre.string'=>'El nombre del estudiante debe de ser texto',
            'nombre.max'=>'El numero de caracteres permitido es 225',
            'email.required'=>'El email del estudiante es obligatorio',
            'email.string'=>'El email del estudiante debe de ser texto',
            'email.max'=>'El numero de caracteres permitido es 225',
            'carrera.required'=>'La carrera del estudiante es obligatoria',
            'semestre.required'=>'El semestre del estudiante es obligatorio',
            'semestre.numeric'=>'El semestre del estudiante debe de ser una cantidad numerica',
            'semestre.min'=>'El semestre minimo de un estudiante es 1',
            'semestre.max'=>'El semestre maximo de un estudiante es 15'
        ]);

        $estudiante = new Estudiante();
        $estudiante->nombre = $request->nombre;
        $estudiante->email = $request->email;
        $estudiante->id_carrera = $request->carrera;
        $estudiante->semestre = $request->semestre;
        $estudiante->save();

        return redirect()->route('estudiante.index')->with('success', 'El estudiante se guardo correctamente');
    }

    public function edit($id){
        $estudiante = Estudiante::findOrFail($id);
        $carreras = Carrera::all();
        $title = "Editar Estudiante";
        return view('estudiantes.edit', compact('estudiante', 'carreras', 'title'));
    }

    public function update($id, Request $request){
        
        $request->validate([
            'nombre'=>'required|string|max:255',
            'email'=>'required|string|max:255',
            'carrera'=>'required',
            'semestre'=>'required|numeric|min:1|max:15'
        ],
        [
            'nombre.required'=>'El nombre del estudiante es obligatorio',
            'nombre.string'=>'El nombre del estudiante debe de ser texto',
            'nombre.max'=>'El numero de caracteres permitido es 225',
            'email.required'=>'El email del estudiante es obligatorio',
            'email.string'=>'El email del estudiante debe de ser texto',
            'email.max'=>'El numero de caracteres permitido es 225',
            'carrera.required'=>'La carrera del estudiante es obligatoria',
            'semestre.required'=>'El semestre del estudiante es obligatorio',
            'semestre.numeric'=>'El semestre del estudiante debe de ser una cantidad numerica',
            'semestre.min'=>'El semestre minimo de un estudiante es 1',
            'semestre.max'=>'El semestre maximo de un estudiante es 15'
        ]);

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->nombre = $request->nombre;
        $estudiante->email = $request->email;
        $estudiante->id_carrera = $request->carrera;
        $estudiante->semestre = $request->semestre;
        $estudiante->save();

        return redirect()->route('estudiante.index')->with('success', 'El estudiante se actualizo correctamente');
    }

    public function delete($id){
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();
        sleep(3);

        return redirect()->back();
    }
}
