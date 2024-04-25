<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelance extends Model
{
    use HasFactory;

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'freelance_competences', 'freelance_id', 'id_competences');
    }

    public function projects()
    {
        return $this->belongsToMany(Competence::class, 'freelance_projects', 'freelance_id', 'project_id');
    }

}
