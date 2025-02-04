@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-center mb-4">{{ $smartphone->nom }}</h1>
    <img src="{{ asset('storage/' . $smartphone->photo) }}" alt="{{ $smartphone->nom }}" class="w-full h-64 object-cover rounded-md shadow-md">
    <div class="mt-4 space-y-3">
        <p><strong>Marque:</strong> {{ $smartphone->marque }}</p>
        <p><strong>Description:</strong> {{ $smartphone->description }}</p>
        <p><strong>Prix:</strong> <span class="text-green-600 font-bold">${{ $smartphone->prix }}</span></p>
        <p><strong>RAM:</strong> {{ $smartphone->ram }}</p>
        <p><strong>Stockage:</strong> {{ $smartphone->rom }}</p>
        <p><strong>Écran:</strong> {{ $smartphone->ecran }}</p>
        <p><strong>Couleurs:</strong> {{ implode(', ', json_decode($smartphone->couleurs, true) ?? []) }}</p>
    </div>
    <a href="{{ route('smartphones.index') }}" class="block text-center mt-6 bg-gray-500 text-white px-4 py-2 rounded">Retour</a>
</div>
@endsection
