<?php

namespace App\Http\Controllers;

use App\Models\Problema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProblemaController extends Controller
{
    public function index()
    {
        $problemas = Problema::latest()->get();
        return view('problemas.index', compact('problemas'));
    }

    public function create()
    {
        return view('problemas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'descricao' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        Problema::create($data);

        return redirect()->route('problemas.index')->with('success', 'Problema registrado com sucesso!');
    }

    public function show(Problema $problema)
    {
        return view('problemas.show', compact('problema'));
    }

    public function edit(Problema $problema)
    {
        return view('problemas.edit', compact('problema'));
    }

    public function update(Request $request, Problema $problema)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'descricao' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            Storage::delete($problema->foto);
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $problema->update($data);

        return redirect()->route('problemas.index')->with('success', 'Problema atualizado com sucesso!');
    }

    public function destroy(Problema $problema)
    {
        if ($problema->foto) {
            Storage::delete($problema->foto);
        }

        $problema->delete();

        return redirect()->route('problemas.index')->with('success', 'Problema excluído com sucesso!');
    }
}
