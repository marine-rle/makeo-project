<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use HasTimestamps;

    // Dans le modèle Project.php

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'projet_competences', 'project_id', 'id_competences');
    }


    public function statut()
    {
        return $this->belongsTo(Statut::class);
    }




    protected $fillable = [
        'title',
        'description',
        'user_id',
        'date_demande',
        'statut_id'
    ];

}
