<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inscription;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( \Auth::user()->isAdmin() ) 
        {
            $total_inscriptions = Inscription::orderBy('id', 'ASC')->count();
            $total_pending_inscription = Inscription::where('status', 'Revisión Pendiente')->orderBy('id', 'ASC')->count();

            return view('panel.dashboard', compact('total_inscriptions', 'total_pending_inscription'));
        }
        else
        {
            return view('panel.dashboard');
        }
    }
}
