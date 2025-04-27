<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule; 

class VehicleController extends Controller
{
    public function index() {
        $vehicules = Vehicule::all(); 
        return view('vehicules', compact('vehicules')); 
    }
}
