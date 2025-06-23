@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- Mensajes de sesión --}}
            @if(session('info'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            {{-- Tarjeta con datos del curso --}}
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Formulario de Matrícula</h4>
                </div>

                <div class="card-body">
                    <p><strong>Curso:</strong> {{ $curso->titulo }}</p>
                    <p><strong>Descripción:</strong> {{ $curso->descripcion }}</p>

                    {{-- Formulario para confirmar matrícula --}}
                    <form method="POST" action="{{ route('matricula.enviar', $curso) }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">¿Estás seguro de que deseas matricularte?</label>
                        </div>

                        <button type="submit" class="btn btn-success">Sí, matricularme</button>
                        <a href="{{ route('curso.show', $curso) }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
