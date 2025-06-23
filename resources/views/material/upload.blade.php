@extends('layouts.layout')

@section('title', 'Subir Material')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4 text-center text-primary fw-bold">Subir Material al Curso</h2>

        {{-- Botón volver siempre disponible --}}
        <div class="text-start mb-4">
            <a href="{{ route('curso.show', $curso->id) }}" class="btn btn-outline-secondary">
                ← Volver al Curso
            </a>
        </div>

        {{-- Mensaje de éxito --}}
        @if (session('success'))
            <div class="alert alert-success d-flex justify-content-between align-items-center">
                <div>{{ session('success') }}</div>
                <a href="{{ route('curso.show', $curso->id) }}" class="btn btn-sm btn-primary ms-3">
                    Ver Curso
                </a>
            </div>
        @endif

        <form action="{{ route('material.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="curso_id" value="{{ $curso->id }}">

            <div class="mb-3">
                <label for="titulo" class="form-label">Título del Material</label>
                <input type="text" class="form-control" name="titulo" id="titulo" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción (opcional)</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="youtube_url" class="form-label">URL de YouTube (opcional)</label>
                <input type="url" class="form-control" name="youtube_url" id="youtube_url"
                    placeholder="https://youtube.com/...">
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen (opcional)</label>
                <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Subir Material</button>
            </div>
        </form>
    </div>
@endsection
