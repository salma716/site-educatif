<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flag;
class FlagController extends Controller
{
public function index() {
    $flags = Flag::all();
    return view('flags', compact('flags'));
}

}
