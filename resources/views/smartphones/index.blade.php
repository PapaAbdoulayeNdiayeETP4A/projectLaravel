@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-bold mb-6 text-center">Liste des Smartphones</h1>


<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($smartphones as $smartphone)
    <div class="bg-white p-4 shadow-lg rounded-lg">
        <img src="{{ asset($smartphone->photo) }}" alt="{{ $smartphone->nom }}" class="w-full h-48 object-cover rounded-md">
        <h2 class="text-xl font-semibold mt-2">{{ $smartphone->nom }}</h2>
        <p class="text-gray-600">{{ $smartphone->marque }}</p>
        <p class="text-lg font-bold text-green-600">${{ $smartphone->prix }}</p>
        <div class="mt-4 flex justify-between">
            <a href="{{ route('smartphones.show', $smartphone->id) }}" class="text-blue-500">Voir</a>
            <a href="{{ route('smartphones.edit', $smartphone->id) }}" class="text-yellow-500">Modifier</a>
            <form action="{{ route('smartphones.destroy', $smartphone->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="text-red-500">Supprimer</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
<div class="mt-6">
    {{ $smartphones->links() }} <!-- Affiche les liens de pagination -->
</div>

@endsection
