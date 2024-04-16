<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Project;
use App\Models\projetCompetence;
use App\Models\Statut;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $projects = Project::where('user_id', $userId)->get();
        return view('project', compact('projects'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $competences = Competence::all();
        return view('dashboard', compact('competences'));
    }


    /**
     * Store a newly created resource in storage.
     */
      public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'competences' => 'required|array', // Assurez-vous que le champ compétences est un tableau
        ]);

        // Récupérer le statut selon le bouton cliqué
        $statut = $request->has('status') && $request->status === 'Envoyé' ? Statut::where('name', 'Envoyé')->first() : Statut::where('name', 'Brouillon')->first();

        // Créer une nouvelle instance de Project
        $project = new Project;
        $project->user_id = auth()->user()->id;
        $project->date_demande = now();

        // Associer le statut au projet
        $project->statut_id = $statut->id;

        $project->title = $request->title;
        $project->description = $request->description;
        $project->save();

        // Récupération des compétences sélectionnées
        $competences = $request->input('competences', []);

        // Enregistrement des compétences sélectionnées pour cette demande
        foreach ($competences as $competenceId) {
            $comp = new projetCompetence;
            $comp->project_id = $project->id;
            $comp->id_competences = $competenceId;
            $comp->save();
        }

        // Rediriger l'utilisateur vers la page de tableau de bord avec un message de succès
        return redirect()->route('dashboard')->with('success', 'Demande créée avec succès!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('show', compact('project'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Project $project)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Project $project)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Project $project)
    // {
    //     //
    // }



public function changeStatus(Request $request, Project $project)
{
    $project->update([
        'statut_id' => 2,
        'date_demande' => Carbon::now() // Met à jour la date du projet à la date actuelle
    ]);

    return redirect()->back()->with('success', 'Statut du projet mis à jour avec succès.');
}

}
