<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatriculaController extends Controller
{
 public function formulario(Curso $curso)
{
    return view('matricula.formulario', compact('curso'));
}

public function matricular(Request $request, Curso $curso)
{
    $user = Auth::user();

    if ($user->cursosMatriculados()->where('curso_id', $curso->id)->exists()) {
        return redirect()->route('curso.show', $curso)->with('info', 'Ya estás matriculado en este curso.');
    }

    $user->cursosMatriculados()->attach($curso->id);

    return redirect()->route('curso.show', $curso)->with('success', 'Te has matriculado correctamente.');
}
}
