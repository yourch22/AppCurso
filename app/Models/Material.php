<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
        protected $fillable = [
        'curso_id',
        'titulo',
        'descripcion',
        'youtube_url',
        'imagen_path', // este campo también lo usas cuando subes imágenes
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
