<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boleta;
use App\Models\User;
use App\Models\Sorteo;
use Carbon\Carbon;

class BoletasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sorteos_actuales = Sorteo::where('ini','<=', Carbon::now())
            ->where('fin','>=', Carbon::now())
            ->pluck('id');
        $boletas = Boleta::whereIn('sorteo_id',$sorteos_actuales)->pluck('codigo');
        return $boletas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['ganadora'] = false;
        //se genera un correo aleatoreo, dado que la app no lo pide
        $gmailGenerico = "generico".random_int(-999,99999999).'@gmail.com';
        $usuarioNuevo = User::create([
            'name' => $request['nombre'],
            'email' => $gmailGenerico,
            'password' => bcrypt('password')
        ]);

        //se recuperan los datos de la boleta
        $request['user_id'] = $usuarioNuevo['id'];

        $request['sorteo_id'] = $request['sorteo_id'];
        $request['cuando_se_vendio'] = Carbon::now('America/Bogota');

        $Boleta = Boleta::create($request->all());
        return response()->json(['id' => $Boleta->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sorteo_id)
    {
        $boletas = Boleta::Where('sorteo_id',$sorteo_id)->orderBy('cuando_se_vendio')->take(5)->get();
        foreach ($boletas as $key => $value) {
            $boletas[$key]['Usuario_nombre'] = User::findOrFail($value['user_id'])->name;
            $sorteoElement = Sorteo::findOrFail($value['sorteo_id']);
            $boletas[$key]['Sorteo'] = $sorteoElement->numero;
            $boletas[$key]['Premio'] = $sorteoElement->valor_ganable;
        }
        return $boletas;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Boleta = Boleta::findOrFail($id);
        if ($Boleta->delete()) {
            return response()->json([
                'message' => 'Success'
            ],204);
        }
        return response()->json([
            'message' => 'Not found2'
        ], 404);
    }
}
