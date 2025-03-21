<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\Validator;  // Importa la clase Validator
use Barryvdh\DomPDF\Facade\Pdf; // Importa DomPDF
use Symfony\Component\HttpFoundation\Response;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Empresa::query();

        // Búsqueda por id
        if ($request->has('id') && !empty($request->id)) {
            $query->where('id', $request->id);
        }

        // Búsqueda por razón_social
        if ($request->has('razon_social') && !empty($request->razon_social)) {
            $query->where('razon_social', 'like', '%' . $request->razon_social . '%');
        }

        $empresas = $query->get();

        return view('empresas.index', compact('empresas')); // Pasar los resultados a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validaciones
        $validator = Validator::make($request->all(), [
            'rif' => 'required|unique:empresas|max:20',
            'razon_social' => 'required|max:255',
            'direccion' => 'required|max:255',
            'telefono' => 'required|max:20',
            'fecha_creacion' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect('empresas/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Creación de la Empresa
        Empresa::create($request->all());

        return redirect()->route('empresas.index')
                         ->with('success', 'Empresa creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        return view('empresas.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        return view('empresas.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        // Validaciones
        $validator = Validator::make($request->all(), [
            'rif' => 'required|unique:empresas,rif,' . $empresa->id . ',id|max:20',
            'razon_social' => 'required|max:255',
            'direccion' => 'required|max:255',
            'telefono' => 'required|max:20',
            'fecha_creacion' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->route('empresas.edit', $empresa->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        // Actualización de la Empresa
        $empresa->update($request->all());

        return redirect()->route('empresas.index')
                         ->with('success', 'Empresa actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();

        return redirect()->route('empresas.index')
                         ->with('success', 'Empresa eliminada correctamente.');
    }

    public function generatePdf()
    {
        $empresas = Empresa::orderBy('fecha_creacion')->get();
        $pdf = Pdf::loadView('empresas.reporte', compact('empresas')); // Crea la vista 'empresas.reporte'
        return $pdf->download('reporte_empresas.pdf');
    }

    public function exportJson()
    {
        $empresas = Empresa::all();
        return response()->json($empresas, Response::HTTP_OK, ['Content-Disposition' => 'attachment; filename="empresas.json"']);
    }
}
