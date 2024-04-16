<x-app-layout>

    <div class="py-12">
        <div class="container">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold mb-4">Créer une demande de projet</h2>
                    <form action="{{ route('project-create.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Entrez le titre du projet" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Entrez la description du projet" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="competence" class="form-label">Compétence</label>
                            <input type="text" name="competence" id="competence" class="form-control" placeholder="Entrez les compétences requises" required>
                        </div>

                        <div class="mb-4">
                            <input type="submit" value="{{ __('Valider')}}" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
