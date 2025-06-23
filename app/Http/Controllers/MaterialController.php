<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
public function create(Curso $curso)
{
    // Si quieres ver todos los cursos en el select:
    $cursos = Curso::all();

    return view('material.upload', compact('curso', 'cursos'));
}

    private function formatYoutubeUrl($url)
    {
        if (strpos($url, 'youtu.be/') !== false) {
            return preg_replace('#https?://youtu\.be/([a-zA-Z0-9_-]+)#', 'https://www.youtube.com/embed/$1', $url);
        }

        if (strpos($url, 'watch?v=') !== false) {
            return preg_replace('#https?://(www\.)?youtube\.com/watch\?v=([a-zA-Z0-9_-]+)#', 'https://www.youtube.com/embed/$2', $url);
        }

        return $url; // Si ya está embebido o es inválido, se queda igual
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'curso_id'     => 'required|exists:cursos,id',
            'titulo'       => 'required',
            'descripcion'  => 'nullable',
            'youtube_url'  => 'nullable|url',
            'imagen'       => 'nullable|image',
        ]);

        // Convertir URL de YouTube a formato embed si está presente
        if (!empty($data['youtube_url'])) {
            $data['youtube_url'] = $this->formatYoutubeUrl($data['youtube_url']);
        }

        // Almacenar imagen si se subió
        if ($request->hasFile('imagen')) {
            $data['imagen_path'] = $request->file('imagen')->store('materiales', 'public');
        }

        Material::create($data);

       return redirect()->back()->with([
    'success' => 'Material subido correctamente.',
    'curso_id' => $data['curso_id'],
]);

    }
}
