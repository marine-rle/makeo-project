<?php

namespace Tests\Feature;

use App\Http\Controllers\ProjectController;
use App\Models\Competence;
use App\Models\Project;
use App\Models\Statut;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{

    use RefreshDatabase;

    public function testIndex()
    {
        // Crée un utilisateur
        $user = User::factory()->create();

        // Crée un projet pour cet utilisateur
        $project = Project::create([
            'user_id' => $user->id,
            'title' => 'Titre du projet',
            'description' => 'Description du projet',
            'statut_id' => Statut::where('name', 'Brouillon')->first()->id,
            'date_demande' => now() // Fournir une valeur pour le champ date_demande
        ]);


        // Simule l'authentification de l'utilisateur
        $this->actingAs($user);

        // Vérifie que la route 'project.index' retourne le code de statut HTTP 200
        $response = $this->get(route('project.index'));
        $response->assertStatus(200);

        // Vérifie que le projet créé est présent dans la vue
        $response->assertSee($project->title);
    }

    public function testStore()
    {
        // Crée un utilisateur
        $user = User::factory()->create();

        // Simule l'authentification de l'utilisateur
        $this->actingAs($user);

        // Crée des données de formulaire pour la création de projet
        $data = [
            'title' => 'Titre du projet',
            'description' => 'Description du projet',
            'competences' => [1, 2, 3] // IDs de compétences simulés
        ];

        // Vérifie que la route 'project.store' crée un nouveau projet dans la base de données
        $response = $this->post(route('project.store'), $data);
        $response->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('projects', [
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $user->id
        ]);
    }

    public function testShow()
    {
        // Crée un utilisateur
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Crée un statut 'Brouillon' s'il n'existe pas encore
        $statut = Statut::firstOrCreate(['name' => 'Brouillon']);

        // Crée un projet pour cet utilisateur avec le statut 'Brouillon'
        $project = Project::create([
            'user_id' => $user->id,
            'title' => 'Titre du projet',
            'description' => 'Description du projet',
            'statut_id' => $statut->id,
            'date_demande' => now() // Vous devez fournir une valeur pour date_demande
        ]);

        // Crée quelques compétences
        $competence1 = Competence::create(['name' => 'Compétence 1']);
        $competence2 = Competence::create(['name' => 'Compétence 2']);

        // Attache les compétences au projet
        $project->competences()->attach([$competence1->id, $competence2->id]);

        // Simule l'authentification de l'utilisateur
        $this->actingAs($user);

        // Accède à la route 'project.show' pour afficher les détails du projet
        $response = $this->get(route('project.show', $project->id));
        $response->assertStatus(200);

        // Vérifie que le titre du projet est présent dans la réponse
        $response->assertSeeText($project->title);

        // Vérifie que la description du projet est présente dans la réponse
        $response->assertSeeText($project->description);

        // Vérifie que les compétences du projet sont présentes dans la réponse
        foreach ($project->competences as $competence) {
            $response->assertSeeText($competence->name);
        }

        // Vérifie que le statut du projet est présent dans la réponse
        $response->assertSeeText($statut->name);

        // Vérifie que la date de demande du projet est présente dans la réponse
        $response->assertSeeText($project->date_demande->format('Y-m-d'));
    }


}
