<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Smartphone;
use Illuminate\Support\Facades\Storage;

class SmartphoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $smartphones = Smartphone::paginate(6); // 6 smartphones par page
        return view('smartphones.index', compact('smartphones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('smartphones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ram' => 'required|string',
            'rom' => 'required|string',
            'ecran' => 'required|string',
            'couleurs' => 'required|array',
        ]);
    
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('smartphones', 'public');
        }
    
        Smartphone::create($validated);
        return redirect()->route('smartphones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('smartphones.show', ['smartphone' => Smartphone::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('smartphones.edit', ['smartphone' => Smartphone::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $smartphone = Smartphone::findOrFail($id);
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ram' => 'required|string',
            'rom' => 'required|string',
            'ecran' => 'required|string',
            'couleurs' => 'required|array',
        ]);
    
        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($smartphone->photo); // Supprimer l'ancienne image
            $validated['photo'] = $request->file('photo')->store('smartphones', 'public');
        }
    
        $smartphone->update($validated);
        return redirect()->route('smartphones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Smartphone::destroy($id);
        return redirect()->route('smartphones.index');
    }
}
