@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-bold mb-6 text-center text-gray-800">📱 Liste des Smartphones</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($smartphones as $smartphone)
    <div class="bg-white p-5 shadow-lg rounded-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
        <img src="{{ asset('storage/' . $smartphone->photo) }}" alt="{{ $smartphone->nom }}" class="w-full h-56 object-cover rounded-md">

        <div class="mt-4">
            <h2 class="text-2xl font-semibold text-gray-900">{{ $smartphone->nom }}</h2>
            <p class="text-gray-500">{{ $smartphone->marque }}</p>
            <p class="text-lg font-bold text-green-600">${{ $smartphone->prix }}</p>
        </div>

        <div class="mt-4 flex justify-between items-center">
            <a href="{{ route('smartphones.show', $smartphone->id) }}" 
               class="bg-indigo-600 text-white px-5 py-2 rounded-lg shadow-lg hover:brightness-90 transition">
               Voir
            </a>
        
            <a href="{{ route('smartphones.edit', $smartphone->id) }}" 
               class="bg-amber-500 text-white px-5 py-2 rounded-lg shadow-lg hover:brightness-90 transition">
               Modifier
            </a>
        
            <form action="{{ route('smartphones.destroy', $smartphone->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" 
                        class="bg-rose-600 text-white px-5 py-2 rounded-lg shadow-lg hover:brightness-90 transition">
                        Supprimer
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-10 flex justify-center">
    {{ $smartphones->links() }}
</div>
@endsection
