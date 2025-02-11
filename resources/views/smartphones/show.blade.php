@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-4xl font-bold text-center text-gray-800">{{ $smartphone->nom }}</h1>

    <div class="flex flex-col md:flex-row items-center gap-6 mt-6">
        <img src="{{ asset('storage/' . $smartphone->photo) }}" alt="{{ $smartphone->nom }}" class="h-80 object-cover rounded-md shadow-md">

        <div class="flex-1 space-y-4">
            <p><strong class="text-gray-700">Marque :</strong> {{ $smartphone->marque }}</p>
            <p><strong class="text-gray-700">Description :</strong> {{ $smartphone->description }}</p>
            <p><strong class="text-gray-700">Prix :</strong> <span class="text-green-600 font-bold text-lg">${{ $smartphone->prix }}</span></p>

            <div class="flex flex-wrap gap-2">
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-md text-sm">RAM: {{ $smartphone->ram }}</span>
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-md text-sm">Stockage: {{ $smartphone->rom }}</span>
                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-md text-sm">Écran: {{ $smartphone->ecran }}</span>
            </div>

            <p><strong class="text-gray-700">Couleurs :</strong> 
                @foreach(json_decode($smartphone->couleurs, true) ?? [] as $couleur)
                    <span class="inline-block bg-gray-200 px-3 py-1 rounded-md text-sm text-gray-700">{{ $couleur }}</span>
                @endforeach
            </p>
        </div>
    </div>

    <div class="mt-6 flex justify-center">
        <a href="{{ route('smartphones.index') }}" class="bg-gradient-to-r from-gray-500 to-gray-700 hover:scale-105 transform transition-all text-white px-6 py-3 rounded-full shadow-md">
            Retour à la liste
        </a>
    </div>
</div>
@endsection
