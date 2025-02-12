@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg mt-10">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">Modifier {{ $smartphone->nom }}</h1>

    <form action="{{ route('smartphones.update', $smartphone->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf @method('PUT')

        <!-- Nom -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" name="nom" value="{{ $smartphone->nom }}" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-yellow-400 outline-none" required>
        </div>

        <!-- Marque -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Marque</label>
            <input type="text" name="marque" value="{{ $smartphone->marque }}" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-yellow-400 outline-none" required>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-yellow-400 outline-none" required>{{ $smartphone->description }}</textarea>
        </div>

        <!-- Prix & Photo -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Prix</label>
                <input type="number" name="prix" value="{{ $smartphone->prix }}" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-yellow-400 outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Photo (laisser vide pour garder l'ancienne)</label>
                <input type="file" name="photo" class="w-full text-sm border border-gray-300 rounded-md focus:ring focus:ring-yellow-400 outline-none">
            </div>
        </div>

        <!-- RAM, ROM, Écran -->
        <div class="grid grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">RAM</label>
                <input type="text" name="ram" value="{{ $smartphone->ram }}" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-yellow-400 outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">ROM</label>
                <input type="text" name="rom" value="{{ $smartphone->rom }}" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-yellow-400 outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Écran</label>
                <input type="text" name="ecran" value="{{ $smartphone->ecran }}" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-yellow-400 outline-none" required>
            </div>
        </div>

        <!-- Couleurs -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Couleurs (séparées par une virgule)</label>
            <input type="text" name="couleurs" value="{{ implode(',', json_decode($smartphone->couleurs)) }}" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-yellow-400 outline-none" required>
        </div>

        <!-- Bouton -->
        <div class="mt-4 text-center">
            <button type="submit" class="bg-yellow-500 text-white text-sm px-6 py-2 rounded-md shadow-md hover:bg-yellow-600 transition">
                Modifier
            </button>
        </div>
    </form>
</div>
@endsection
