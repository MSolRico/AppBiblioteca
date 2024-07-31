<?php

namespace App\Http\Controllers;
use App\Models\Estado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function index()
    {
        $estados = Estado::all();
        return view('estados.index', compact('estados'));
    }

    public function create()
    {
        return view('estados.create');
    }

    public function store(Request $request)
    {
        $estado = new Estado();
        $estado->Disponibilidad = $request->Disponibilidad;
        $estado->save();

        return redirect()->route('estados.index');
    }

    public function show($id)
    {
        $estado = Estado::find($id);
        return view('estados.show', compact('estado'));
    }

    public function edit($id)
    {
        $estado = Estado::find($id);
        return view('estados.edit', compact('estado'));
    }

    public function update(Request $request, $id)
    {
        $estado = Estado::find($id);
        $estado->Disponibilidad = $request->Disponibilidad;
        $estado->save();

        return redirect()->route('estados.index');
    }

    public function destroy($id)
    {
        $estado = Estado::find($id);
        $estado->delete();

        return redirect()->route('estados.index');
    }
}