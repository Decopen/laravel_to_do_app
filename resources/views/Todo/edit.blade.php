@extends('base')

@section('title' , "Tout est sur cette page")

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Formulaire d'ajout de tâche -->
        <div class="col-12 mb-4">
            <div class="p-4 border rounded bg-light shadow-sm">
                <h4 class="mb-4">Modifier la tache  : "{{ $todo->nom}}"</h4>
                <form action="" method="POST">
                    @csrf
                    @method("POST")
                    <div class="form-group mb-3">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ old("nom" , $todo->nom) }}">
                        @error('nom')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control form-control-lg" id="description" name="description" rows="6" placeholder="Entrez la description de votre tache">{{ old("description" , $todo->description) }}</textarea>
                        @error('description')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="jour_a_faire">Jour à faire</label>
                        <input type="date" class="form-control" id="jour_a_faire" name="jour_a_faire" value="{{ old("jour_a_faire" , $todo->jour_a_faire) }}">
                        @error('jour_a_faire')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route("Todo.show")}}" class="btn btn-danger">Retour</a>
                        <button  class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
