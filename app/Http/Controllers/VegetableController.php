<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vegetable;
class VegetableController extends Controller
{
    
public function index() {
    $vegetables = Vegetable::all();
    return view('vegetables', compact('vegetables'));
}

}
