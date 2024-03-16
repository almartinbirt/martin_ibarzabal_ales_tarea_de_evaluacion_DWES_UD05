<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Compra;
use App\Models\Usuario;

class PageController extends Controller
{

    // PRODUCTOS
    public function productosAll()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    public function productoPorID($id)
    {
        $producto = Producto::findOrFail($id);
        return response()->json($producto);
    }

    public function crearProducto(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);

        $producto = Producto::create($request->all());
        return response()->json($producto);
    }

    public function actualizarProducto(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return response()->json($producto);
    }

    public function borrarProducto($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response()->json(null, 204);
    }


    // COMPRASS
    public function comprasAll()
    {
        $tablaCompras = Compra::all();
        return response()->json($tablaCompras);
    }


    // USUARIOS
    public function usuariosAll()
    {
        $tablaUsuarios = Usuario::all();
        return response()->json($tablaUsuarios);
    }
}
