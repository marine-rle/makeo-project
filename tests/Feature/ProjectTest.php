<?php

namespace Tests\Feature;

use App\Models\Competence;
use App\Models\Project;
use App\Models\Statut;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_belongs_to_many_competences()
    {
        // Créer un utilisateur
        $user = User::factory()->create();

        // Créer un projet associé à l'utilisateur
        $project = Project::create([
            'title' => 'Test Project',
            'description' => 'Description of Test Project',
            'date_demande' => now(),
            'user_id' => $user->id, // Définir l'utilisateur associé au projet
            'statut_id' => 1, // Définir le statut par défaut ou la valeur appropriée
        ]);

        // Créer deux compétences
        $competence1 = Competence::create(['name' => 'Competence 1']);
        $competence2 = Competence::create(['name' => 'Competence 2']);

        // Attacher les compétences au projet
        $project->competences()->attach([$competence1->id, $competence2->id]);

        // Vérifier que le projet a les deux compétences attachées
        $this->assertEquals(2, $project->competences()->count());
        $this->assertTrue($project->competences->contains($competence1));
        $this->assertTrue($project->competences->contains($competence2));
    }

    public function test_belongs_to_statut()
    {
        // Créer un utilisateur
        $user = User::factory()->create();

        // Créer un statut manuellement
        $statut = new Statut(['name' => 'Statut Test']);
        $statut->save();

        // Créer un projet associé à l'utilisateur avec le statut
        $project = Project::create([
            'title' => 'Test Project',
            'description' => 'Description of Test Project',
            'date_demande' => now(),
            'user_id' => $user->id, // Définir l'utilisateur associé au projet
            'statut_id' => $statut->id, // Définir le statut associé au projet
        ]);

        // Vérifier que le projet appartient au statut créé
        $this->assertInstanceOf(Statut::class, $project->statut);
        $this->assertEquals($statut->id, $project->statut->id);
    }


}
