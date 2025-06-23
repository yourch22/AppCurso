@extends('layouts.layout')

@section('title', 'Contenido del Curso')

@section('content')
<div class="container-fluid px-5 py-5">

    {{-- Alertas --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @if(session('info'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    {{-- Encabezado y botones --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary fw-bold mb-0">{{ $curso->nombre }}</h1>
        <div class="d-flex gap-2">
            <a href="{{ route('cursos.porCiclo', $curso->ciclo_id) }}" class="btn btn-outline-secondary">
                ← Regresar al Ciclo
            </a>
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('material.create', ['curso' => $curso->id]) }}" class="btn btn-primary">
                    + Agregar Material
                </a>
            @endif
        </div>
    </div>

    {{-- Materiales en formato acordeón --}}
    @if($materiales->count())
        <div class="accordion" id="accordionMateriales">
            @foreach($materiales as $index => $material)
                @php
                    $videoId = '';
                    if ($material->youtube_url) {
                        $urlParts = parse_url($material->youtube_url);
                        if (isset($urlParts['query'])) {
                            parse_str($urlParts['query'], $queryParams);
                            $videoId = $queryParams['v'] ?? '';
                        } elseif (isset($urlParts['path'])) {
                            $segments = explode('/', trim($urlParts['path'], '/'));
                            $videoId = end($segments);
                        }
                    }
                @endphp
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $index }}">
                        <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                aria-controls="collapse{{ $index }}">
                            {{ $material->titulo }}
                        </button>
                    </h2>
                    <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                         aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionMateriales">
                        <div class="accordion-body">

                            {{-- Contenido Multimedia --}}
                            @if($videoId)
                                <div class="ratio ratio-16x9 mb-3">
                                    <iframe src="https://www.youtube.com/embed/{{ $videoId }}" allowfullscreen></iframe>
                                </div>
                            @elseif($material->imagen_path)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $material->imagen_path) }}"
                                         class="img-fluid rounded shadow"
                                         alt="Imagen del material">
                                </div>
                            @elseif($material->youtube_url)
                                <div class="text-danger mb-3">URL de YouTube inválida.</div>
                            @endif

                            <p>{{ $material->descripcion ?? 'Sin descripción.' }}</p>

                            {{-- Botones admin --}}
                            @if(Auth::user()->role === 'admin')
                                <div class="mt-3 d-flex gap-2">
                                    <a href="#" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="#" method="POST" onsubmit="return confirm('¿Eliminar este material?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center mt-5">
            No hay materiales disponibles para este curso.
        </div>
    @endif

</div>
@endsection
