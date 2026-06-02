<?php

namespace App\Http\Controllers;

use App\Models\Ferramenta;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FerramentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ferramentas = Ferramenta::all();
        $categorias = Categoria::all();
        return view('ferramentas.index' , compact('ferramentas' , 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();

        return view('ferramentas.create' , compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validated = $request->validate([
            'categorias_id' => 'required|exists:categorias,id',
            'nome' => 'required|string|max:255',

            'marca' => 'required|string',
            'modelo' => 'required|string',

            'material_cabo' => 'required|string',
            'tamanho_chave' => 'required|string',
            'tensao_eletrica' => 'required|string',
            'peso' =>'required|string',

            'quanti_estoque' => 'required|integer',
            'estoque_min' => 'required|integer',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB

        ],[
            'image.image' => 'O arquivo deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            'image.max' => 'A imagem não pode ser maior que 2MB.',
        ]);

        // Processar upload da imagem
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ferramentas', 'public');
            $validated['image'] = $imagePath;
        }

        // Adicionar Ferramenta
        Ferramenta::create($validated);

        return redirect()->route('ferramentas.index')->with('success', 'Ferramenta adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ferramenta $ferramenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ferramenta $ferramenta)
    {
        $categorias = Categoria::all();

        return view('ferramentas.edit' , compact('ferramenta' , 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ferramenta $ferramenta)
    {
        $validated = $request->validate([
            'categorias_id' => 'required|exists:categorias,id',
            'nome' => 'required|string|max:255',

            'marca' => 'required|string',
            'modelo' => 'required|string',

            'material_cabo' => 'required|string',
            'tamanho_chave' => 'required|string',
            'tensao_eletrica' => 'required|string',
            'peso' =>'required|string',

            'quanti_estoque' => 'required|integer',
            'estoque_min' => 'required|integer',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB

        ],[
            'image.image' => 'O arquivo deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            'image.max' => 'A imagem não pode ser maior que 2MB.',
        ]);

        // Processar upload da nova imagem
        if ($request->hasFile('image')) {
            // Deletar imagem anterior se existir
            if ($ferramenta->image && Storage::disk('public')->exists($ferramenta->image)) {
                Storage::disk('public')->delete($ferramenta->image);
            }

            // Armazenar nova imagem
            $imagePath = $request->file('image')->store('ferramentas', 'public');
            $validated['image'] = $imagePath;
        }

        // Atualizar post
        $ferramenta->update($validated);

        return redirect()->route('ferramentas.index')->with('success', 'Ferramenta atualizada com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ferramenta $ferramenta)
    {
        // Deletar imagem se existir
        if ($ferramenta->image && Storage::disk('public')->exists($ferramenta->image)) {
            Storage::disk('public')->delete($ferramenta->image);
        }

        // Deletar post
        $ferramenta->delete();

        return redirect()->route('ferramentas.index')->with('success', 'Ferramenta deletada com sucesso!');
    }
}
