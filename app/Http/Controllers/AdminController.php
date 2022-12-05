<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inscription;

use Flash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscriptions = Inscription::orderBy('lastname', 'ASC')->get();

        $title = 'Listado de inscripciones';

        return view('admin.inscriptionslists', compact('title', 'inscriptions'));
    }

    public function pendingList()
    {
        $inscriptions = Inscription::where('status', 'Revisión Pendiente')->orderBy('updated_at', 'DESC')->get();

        $title = 'Listado de inscripciones con revisión pendiente';

        return view('admin.inscriptionslists', compact('title', 'inscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $inscription = Inscription::findOrFail($id);
        $administrador = \Auth::user()->email;
      
        if ($request->status != null) {
            $inscription->update([
                'status' => $request->status,
                'observations' => $request->observations,
                'admin_manages' => $administrador
            ]);
            Flash::success('La observación se agregó correctamente.');
            return redirect(route('inscriptions.list'));
        }else{
            Flash::error('Seleccione un estado valido.');
            return redirect(route('inscriptions.list'));
        }


       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
