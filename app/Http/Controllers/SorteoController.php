<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sorteo;
use Carbon\Carbon;

class SorteoController extends Controller
{
    public function index() {
        return Sorteo::Select('sorteos.*','boletas.codigo')
        ->leftjoin('boletas','sorteos.id','boletas.sorteo_id')
        ->whereActiva('1')
        ->where('Fin','<=',Carbon::now('America/Bogota'))
        ->where('Fin','>=',Carbon::now('America/Bogota')->subWeek())
        ->where('boletas.ganadora',true)
        ->orderByDesc('ini')
        ->get();
    }

    public function create() { }
    public function store(Request $request) {
        $sorteo = Sorteo::create($request->all());
        return response()->json(compact('sorteo'));
     }

    public function show($id) {
        return Sorteo::
        whereActiva('1')
        ->where('Fin','>',Carbon::now('America/Bogota'))
        ->orderByDesc('Fin')
        ->get();
    }

    public function edit($id) { }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) { }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Sorteo = Sorteo::findOrFail($id);
        if ($Sorteo->delete()) {
            return response()->json([
                'message' => 'Success'
            ],204);
        }
        return response()->json([
            'message' => 'Not found2'
        ], 404);
    }
}
