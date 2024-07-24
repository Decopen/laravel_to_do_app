@extends('base')

@section('title', "taches")

@section('content')
    @if ($todofait->isEmpty())
        <p>
            Pas de tache
        </p>
    @else
    @foreach ($todofait as $tache)
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ $tache->nom }}</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            <strong>Nom :</strong> {{ $tache->nom }}
                        </p>
                        <p>
                            <strong>Description :</strong> {{ $tache->description }}
                        </p>
                        <p>
                            <strong>Fait :</strong>
                            @if($tache->fait == 1)
                                <span class="badge bg-success">Oui</span>
                            @else
                                <span class="badge bg-danger">Non</span>
                            @endif
                        </p>
                        <p>
                            <strong>Jour à faire :</strong> {{ \Carbon\Carbon::parse($tache->jour_a_faire)->format('d/m/Y') }}
                        </p>
                        <p>
                            <strong>Jour de création :</strong> {{ \Carbon\Carbon::parse($tache->created_at)->format('d/m/Y H:i') }}
                        </p>
                        <p>
                            <strong>Dernière modification :</strong> {{ \Carbon\Carbon::parse($tache->updated_at)->format('d/m/Y H:i') }}
                        </p>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('Todo.show') }}" class="btn btn-secondary">Retour à la liste</a>
                            <div class="d-flex">
                                <a href="{{ route('Todo.edit', $tache->id) }}" class="btn btn-success me-2">Modifier</a>
                                <form action="{{ route('Todo.delete', $tache->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    {{ $todofait->links() }}
@endsection
