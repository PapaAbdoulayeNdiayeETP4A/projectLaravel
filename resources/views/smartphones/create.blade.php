@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Ajouter un Smartphone</h1>
    
    <form action="{{ route('smartphones.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="block text-lg font-semibold">Nom</label>
        <input type="text" name="nom" class="w-full p-2 border rounded" required>

        <label class="block text-lg font-semibold mt-2">Marque</label>
        <input type="text" name="marque" class="w-full p-2 border rounded" required>

        <label class="block text-lg font-semibold mt-2">Description</label>
        <textarea name="description" class="w-full p-2 border rounded" required></textarea>

        <label class="block text-lg font-semibold mt-2">Prix</label>
        <input type="number" name="prix" class="w-full p-2 border rounded" required>

        <label class="block text-lg font-semibold mt-2">Photo</label>
        <input type="file" name="photo" class="w-full p-2 border rounded">

        <label class="block text-lg font-semibold mt-2">RAM</label>
        <input type="text" name="ram" class="w-full p-2 border rounded" required>

        <label class="block text-lg font-semibold mt-2">ROM</label>
        <input type="text" name="rom" class="w-full p-2 border rounded" required>

        <label class="block text-lg font-semibold mt-2">Écran</label>
        <input type="text" name="ecran" class="w-full p-2 border rounded" required>

        <label class="block text-lg font-semibold mt-2">Couleurs (séparées par une virgule)</label>
        <input type="text" name="couleurs" class="w-full p-2 border rounded" required>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Ajouter</button>
    </form>
</div>
@endsection
