<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use Illuminate\Http\Request;

class CicloController extends Controller
{
    public function index()
{
    $ciclos = Ciclo::all();
    return view('ciclos.index', compact('ciclos'));
}

}
