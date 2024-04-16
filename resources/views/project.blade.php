<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes projets') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="table-responsive-sm">
                        <table class="table table-striped ">
                            <thead>
                                <tr class="table-dark">
                                    {{-- <th scope="col" style="width: 5%;">#</th> <!-- Fixer la largeur de la colonne id --> --}}
                                    <th scope="col" style="width: 25%;">Titre</th> <!-- Largeur proportionnelle -->
                                    <th scope="col" style="width: 30%;">Description</th> <!-- Largeur proportionnelle -->
                                    {{-- <th scope="col" style="width: 25%;">Compétences requises</th> <!-- Largeur proportionnelle --> --}}
                                    <th scope="col" style="width: 10%;">Statut</th>
                                    <th scope="col" style="width: 10%;">Date</th>
                                    <th scope="col" style="width: 5%;"></th> <!-- Fixer la largeur de la colonne du bouton -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        {{-- <td>{{ $project->id }}</td> --}}
                                        <td>
                                            @php
                                                $titleWords = str_word_count($project->title);
                                                echo $titleWords > 10 ? implode(' ', array_slice(explode(' ', $project->title), 0, 10)) . '...' :  ucfirst($project->title);
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                                $descriptionWords = str_word_count($project->description);
                                                echo $descriptionWords > 10 ? implode(' ', array_slice(explode(' ', $project->description), 0, 10)) . '...' :  ucfirst($project->description);
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                                $statutWords = str_word_count($project->statut->name);
                                                echo $statutWords > 10 ? implode(' ', array_slice(explode(' ', $project->statut->name), 0, 10)) . '...' : $project->statut->name;
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                                echo \Carbon\Carbon::parse($project->date_demande)->format('d/m/Y');
                                            @endphp
                                        </td>
                                        <td class="text-center">
                                            <form method="GET" action="{{ route('show', ['project' => $project->id]) }}">
                                                @csrf
                                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                                <button type="submit" class="btn btn-outline-primary">{{ __('Info')}}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
