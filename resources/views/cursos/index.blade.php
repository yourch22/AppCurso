@extends('layouts.layout')

@section('content')
    <div class="container py-5">
            <!-- Botón volver -->
    <div class="mb-4">
        <a href="{{ route('ciclos.index') }}" class="btn btn-link text-decoration-none text-primary d-inline-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.75.75 0 0 1-.75.75H3.56l3.72 3.72a.75.75 0 1 1-1.06 1.06l-5-5a.75.75 0 0 1 0-1.06l5-5a.75.75 0 0 1 1.06 1.06L3.56 7.25h10.69A.75.75 0 0 1 15 8z"/>
            </svg>
            Volver
        </a>
    </div>
        <h1 class="text-center mb-5 text-primary fw-bold">
            Cursos del Ciclo: <span class="text-dark">{{ $ciclo->nombre }}</span>
        </h1>

        <div class="row g-4">
            @forelse($cursos as $curso)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100 border-0 shadow rounded-4">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h5 class="card-title text-primary fw-semibold">{{ $curso->nombre }}</h5>
                                <p class="text-muted small">Curso disponible en este ciclo académico.</p>
                            </div>

                            <div class="text-center mt-auto">
                                @if (Auth::user()->role === 'admin' || Auth::user()->cursosMatriculados->contains($curso->id))
                                    <a href="{{ route('curso.show', $curso) }}"
                                        class="btn btn-success btn-sm rounded-pill px-4">
                                        Ver Curso
                                    </a>
                                @else
                                    <form class="form-matricula" data-curso="{{ $curso->id }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary btn-sm rounded-pill px-4">
                                            Matricularme
                                        </button>
                                    </form>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        No hay cursos disponibles en este ciclo.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.querySelectorAll('.form-matricula').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Te estás matriculando en este curso.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, matricularme',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const realForm = document.createElement('form');
                        realForm.method = 'POST';
                        realForm.action = `/curso/${form.dataset.curso}/matricula`;

                        const csrf = document.createElement('input');
                        csrf.type = 'hidden';
                        csrf.name = '_token';
                        csrf.value = '{{ csrf_token() }}';

                        realForm.appendChild(csrf);
                        document.body.appendChild(realForm);
                        realForm.submit();
                    }
                });
            });
        });
    </script>
@endpush
