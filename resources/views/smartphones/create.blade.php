@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg mt-10">
    <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">Ajouter un Smartphone</h1>

    <form action="{{ route('smartphones.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <!-- Nom -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" name="nom" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-blue-400 outline-none" required>
        </div>

        <!-- Marque -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Marque</label>
            <input type="text" name="marque" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-blue-400 outline-none" required>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-blue-400 outline-none" required></textarea>
        </div>

        <!-- Prix & Photo -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Prix</label>
                <input type="number" name="prix" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-blue-400 outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Photo</label>
                <input type="file" name="photo" class="w-full text-sm border border-gray-300 rounded-md focus:ring focus:ring-blue-400 outline-none">
            </div>
        </div>

        <!-- RAM, ROM, Écran -->
        <div class="grid grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">RAM</label>
                <input type="text" name="ram" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-blue-400 outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">ROM</label>
                <input type="text" name="rom" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-blue-400 outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Écran</label>
                <input type="text" name="ecran" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-blue-400 outline-none" required>
            </div>
        </div>

        <!-- Couleurs -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Couleurs (séparées par une virgule)</label>
            <input type="text" name="couleurs" placeholder="Ex: Rouge, Bleu, Noir" class="w-full py-2 px-3 border border-gray-300 rounded-md text-sm focus:ring focus:ring-blue-400 outline-none" required>
        </div>

        <!-- Bouton -->
        <div class="mt-4 text-center">
            <button type="submit" class="bg-blue-600 text-white text-sm px-6 py-2 rounded-md shadow-md hover:bg-blue-700 transition">
                Ajouter
            </button>
        </div>
    </form>
</div>
@endsection
