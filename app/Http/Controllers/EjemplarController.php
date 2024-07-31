<?php

namespace App\Http\Controllers;
use App\Models\Ejemplar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EjemplarController extends Controller
{
    public function index()
    {
        $ejemplares = Ejemplar::all();
        return view('ejemplares.index', compact('ejemplares'));
    }

    public function create()
    {
        return view('ejemplares.create');
    }

    public function store(Request $request)
    {
        $ejemplar = new Ejemplar();
        $ejemplar->Numero_Ejemplar = $request->Numero_Ejemplar;
        $ejemplar->Estado_Ejemplar = $request->Estado_Ejemplar;
        $ejemplar->save();

        return redirect()->route('ejemplares.index');
    }

    public function show($id)
    {
        $ejemplar = Ejemplar::find($id);
        return view('ejemplares.show', compact('ejemplar'));
    }

    public function edit($id)
    {
        $ejemplar = Ejemplar::find($id);
        return view('ejemplares.edit', compact('ejemplar'));
    }

    public function update(Request $request, $id)
    {
        $ejemplar = Ejemplar::find($id);
        $ejemplar->Numero_Ejemplar = $request->Numero_Ejemplar;
        $ejemplar->Estado_Ejemplar = $request->Estado_Ejemplar;
        $ejemplar->save();

        return redirect()->route('ejemplares.index');
    }

    public function destroy($id)
    {
        $ejemplar = Ejemplar::find($id);
        $ejemplar->delete();

        return redirect()->route('ejemplares.index');
    }
}