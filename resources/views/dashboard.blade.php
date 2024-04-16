<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une demande de projet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('project.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium">Titre</label>
                            <input type="text" name="title" id="title" class="form-input mt-1 block w-full" placeholder="Entrez le titre du projet" required maxlength="50">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium">Description</label>
                            <textarea name="description" id="description" class="form-textarea mt-1 block w-full" rows="3" placeholder="Entrez la description du projet" required maxlength="255"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="competence" class="flex items-center text-sm font-medium">
                                <span>Compétence</span>
                                <img src="../images/info.svg" alt="Information" style="width: 16px; height: 16px; margin-left: 2px; cursor: pointer;" onclick="showMessage(event)">
                            </label>

                            <select name="competences[]" id="competence" class="form-select" multiple required>
                                @foreach ($competences as $competence)
                                    <option value="{{ $competence->id }}">{{ $competence->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <button type="submit" name="status" value="Envoyé" class="btn btn-outline-success">{{ __('Valider et Envoyer')}}</button>
                            <button type="submit" name="status" value="Brouillon" class="btn btn-outline-secondary">{{ __('Valider en Brouillon')}}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showMessage(event) {
            if (!event.ctrlKey) {
                alert("Veuillez maintenir la touche Ctrl en sélectionnant les compétences souhaitées.");
            }
        }
    </script>
</x-app-layout>
