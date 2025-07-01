<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(3)->withQueryString();

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
            $request->validate([
            'nombre'           => 'required|min:2',
            'precio'           => 'required|numeric',
            'descripcion'      =>  'required'
        ],[
            'nombre.required'        => 'El título debe tener un valor',
            'nombre.min'             => 'El título debe tener al menos :min caracteres',
            'precio.required'        => 'El precio debe tener un valor',
            'precio.numeric'         => 'El precio debe ser un valor numérico',
            'descripcion.required'   => 'La fecha debe tener un valor'
        ]);

        $input = $request->all();

        $producto = Producto::create($input);

        return redirect()
            ->route('productos.index')
            ->with('feedback.message' , 'El producto <b>'. e($request->nombre) .'</b> se publico exitosamente');
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', [
            'producto' => $producto,
        ]);
    }



    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|min:2',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.min' => 'El nombre debe tener al menos :min caracteres',
            'descripcion.required' => 'La descripción es obligatoria',
            'precio.required' => 'El precio es obligatorio',
            'precio.numeric' => 'El precio debe ser numérico',
        ]);

        $producto->update($request->all());

        return redirect()
            ->route('productos.index')
            ->with('feedback.message', 'El producto <b>' . e($producto->nombre) . '</b> se actualizó');
    }


    public function destroy(Producto $producto){
        $producto->delete();
        return redirect()
            ->route('productos.index')
            ->with('feedback.message', 'El producto <b>'.e($producto->nombre).'</b> se eliminó');
    }

    public function delete(int $id)
    {
        return view('productos.delete', [
            'producto' => Producto::findOrFail($id)
        ]);
    }
}
