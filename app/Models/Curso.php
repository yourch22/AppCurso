<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class);
    }

    public function materiales()
    {
        return $this->hasMany(Material::class);
    }
    public function estudiantes()
    {
        return $this->belongsToMany(User::class, 'matriculas');
    }
}
