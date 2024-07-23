@extends('base')

@section('title' , "Tout est sur cette page")

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Formulaire d'ajout de tâche -->
        <!-- Section des tâches non faites -->
        <div class="col-6 mb-4">
            <div class="p-4 border rounded bg-light shadow-sm">
                <h4 class="mb-4">Toutes les tâches dejà faites</h4>
                @if ($todofait->isNotEmpty())
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todofait as $todo)
                                <tr>
                                    <td>{{ $todo->nom }}</td>
                                    {{-- <td>
                                        @if ($todo->fait == 1)
                                            Oui
                                        @else
                                            Non
                                        @endif
                                    </td> --}}
                                    <td>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('Todo.info', ['todo' => $todo->id]) }}" class="btn btn-primary btn-sm">Voir plus</a>
                                    <a href="{{ route('Todo.edit', ['todo' => $todo->id]) }}" class="btn btn-success btn-sm">Modifier</a>
                                    <form action="{{ route("Todo.delete" , ["todo" => $todo->id]) }}">
                                        @csrf
                                        @method("delete")
                                        <button class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                    <a href="{{ route("Todo.chageState" , ["todo" => $todo->id]) }}" class="btn btn-outline-dark btn-sm">descativée</a>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Aucune information</p>
                @endif
            </div>
        </div>

        <!-- Section des tâches déjà faites -->
        <div class="col-6 mb-4">
            <div class="p-4 border rounded bg-light shadow-sm">
                <h4 class="mb-4">Toutes les tâches non faites</h4>
                @if ($todo_non_fait->isNotEmpty())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($todo_non_fait as $todo)
                            <tr>
                                <td>{{ $todo->nom }}</td>
                                {{-- <td>
                                    @if ($todo->fait == 1)
                                        Oui
                                    @else
                                        Non
                                    @endif
                                </td> --}}
                                <td>
                                    <div class="d-flex justify-content-between">
                                            <a href="{{ route('Todo.info', ['todo' => $todo->id]) }}" class="btn btn-primary btn-sm">Voir plus</a>
                                        <a href="{{ route('Todo.edit', ['todo' => $todo->id]) }}" class="btn btn-success btn-sm">Modifier</a>
                                        <form action="{{ route("Todo.delete" , ["todo" => $todo->id]) }}">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                        <a href="{{ route("Todo.chageState" , ["todo" => $todo->id]) }}" class="btn btn-outline-dark btn-sm">Achevée</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p>Aucune information trouvée</p>
                @endif
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="p-4 border rounded bg-light shadow-sm">
                <h4 class="mb-4">Ajouter une tâche</h4>
                <form action="" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ old("nom") }}">
                        @error('nom')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control form-control-lg" id="description" name="description" rows="6" placeholder="Entrez la description de votre tache">{{old('description')}}</textarea>
                        @error('description')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="jour_a_faire">Jour à faire</label>
                        <input type="date" class="form-control" id="jour_a_faire" name="jour_a_faire" value="{{old("jour_a_faire")}}"  min="{{ date('Y-m-d') }}">
                        @error('jour_a_faire')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="#"><button type="reset" class="btn btn-danger">Annuler</button></a>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
