<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails du projet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-50 mx-auto bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mt-4">
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="border-b border-gray-200 pb-4 mb-4">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ ucfirst($project->title) }}</h3>
                                    <p class="text-sm text-gray-600">{{ ucfirst($project->description) }}</p>
                                    <br>
                                    <p class="text-sm text-danger">
                                        @foreach ($project->competences as $competence)
                                            {{ $competence->name }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </p>
                                </div>

                                <div class="flex justify-between items-center">
                                    <div>
                                        <span
                                            class="inline-block bg-gray-200 rounded-full py-1 text-sm font-semibold text-gray-700 mr-2">
                                            {{ $project->statut->name }}
                                        </span>
                                    </div>
                                    <div class="text-sm text-gray-600">{{\Carbon\Carbon::parse($project->date_demande)->format('d/m/Y') }}</div>
                                </div>
                                <div class="text-center mt-4">
                                    @if ($project->statut_id == 1)
                                        <!-- Bouton pour changer le statut -->
                                        <form method="POST"
                                            action="{{ route('changer_statut', ['project' => $project->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="btn btn-outline-success">{{ __('Envoyer') }}</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
