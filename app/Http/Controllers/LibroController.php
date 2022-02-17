<?php

namespace App\Http\Controllers;

use App\Models\Libro;

// Se debe importar el modelo de la tabla fuerte
use App\Models\Categoria;
use Illuminate\Http\Request;

/**
 * Class LibroController
 * @package App\Http\Controllers
 */
class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::paginate();

        return view('libro.index', compact('libros'))
            ->with('i', (request()->input('page', 1) - 1) * $libros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* En el método create() se le envía también los datos de la tabla fuerte
    para que puedan usar los valores de esta en el formulario */
    public function create()
    {
        $libro = new Libro();

        /* El método pluck(), realiza una consulta en la tabla indicada,
        y trae las columnas en el orden que se ponen en sus argumentos */
        $categorias = Categoria::pluck('nombre', 'id');

        // Se le envía a la vista también la consulta almacenada en la variable
        // categorías
        return view('libro.create', compact('libro', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Libro::$rules);

        $libro = Libro::create($request->all());

        return redirect()->route('libros.index')
            ->with('success', 'Libro created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::find($id);

        return view('libro.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::find($id);

        $categorias = Categoria::pluck('nombre', 'id');

        return view('libro.edit', compact('libro', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Libro $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        request()->validate(Libro::$rules);

        $libro->update($request->all());

        return redirect()->route('libros.index')
            ->with('success', 'Libro updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $libro = Libro::find($id)->delete();

        return redirect()->route('libros.index')
            ->with('success', 'Libro deleted successfully');
    }
}
