@extends('layouts.layout')

@section('title', 'Ciclos Académicos')

@section('content')
<div class="container py-5">
    <!-- Título -->
    <h1 class="text-center text-primary fw-bold mb-5">Ciclos Académicos Disponibles</h1>

    <!-- Ciclos -->
    <div class="row justify-content-center">
        @foreach($ciclos as $ciclo)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 rounded-4">
                    <div class="card-header text-white text-center rounded-top-4" style="background: linear-gradient(135deg, #0062E6, #33AEFF);">
                        <h4 class="mb-0 fw-semibold">{{ $ciclo->nombre }}</h4>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between text-center">
                        <p class="card-text text-secondary mt-3">
                            Explora los cursos del ciclo <strong>{{ $ciclo->nombre }}</strong> y empieza a aprender con nosotros.
                        </p>
                        <div class="my-4">
                            <a href="{{ route('cursos.porCiclo', $ciclo) }}" class="btn btn-outline-primary btn-sm px-4">Ver Cursos</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
