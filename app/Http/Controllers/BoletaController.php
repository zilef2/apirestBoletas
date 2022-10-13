<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoletaResource;
use App\Models\Boleta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoletaController extends Controller
{
    public function index()
    {
        return BoletaResource::collection(Boleta::latest()->paginate());
    }

    // public function show($id)
    public function show(Boleta $Boleta)
    {
        // dd(Boleta::find($id));
        // return new BoletaResource(Boleta::find($id));
        return new BoletaResource($Boleta);
    }
    // public function show($id)
    // {
    //     // return new BoletaResource(Boleta::find($id));
    //     (Boleta::find($id));
    //     return
    //     [
    //         'id' => $this->id,
    //         'codigo' => $this->codigo,
    //         'boleta' => new BoletaResource($this->boleta)
    //     ];
    // }
    public function destroy(Boleta $Boleta)
    {
        if ($Boleta->delete()) {
            return response()->json([
                'message' => 'Success'
            ],204);
        }
        return response()->json([
            'message' => 'Not found'
        ], 404);
    }
}
