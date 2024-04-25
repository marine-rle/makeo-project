<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Freelance;
use App\Models\FreelanceCompetence;
use Illuminate\Http\Request;

class FreelanceController extends Controller
{
    public function create()
    {
        $competences = Competence::all();
        return view('freelance', compact('competences'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'competences' => 'required|array', // Assurez-vous que le champ compétences est un tableau
        ]);

        // Créer une nouvelle instance de Project
        $freelance = new Freelance;


        $freelance->name = $request->name;
        $freelance->description = $request->description;
        $freelance->save();

        // Récupération des compétences sélectionnées
        $competences = $request->input('competences', []);

        // Enregistrement des compétences sélectionnées pour cette demande
        foreach ($competences as $competenceId) {
            $comp = new FreelanceCompetence;
            $comp->freelance_id = $freelance->id;
            $comp->id_competences = $competenceId;
            $comp->save();
        }

        // Rediriger l'utilisateur vers la page de tableau de bord avec un message de succès
        return redirect()->route('freelance')->with('success', 'Demande créée avec succès!');
    }
}
