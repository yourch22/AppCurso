<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function porCiclo(Ciclo $ciclo)
    {
        $cursos = $ciclo->cursos()->take(8)->get();
        return view('cursos.index', compact('ciclo', 'cursos'));
    }

public function show(Curso $curso)
{
    $materiales = $curso->materiales;
    return view('cursos.show', compact('curso', 'materiales'));
}

}
