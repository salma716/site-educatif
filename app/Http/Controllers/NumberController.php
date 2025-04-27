<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Number;
class NumberController extends Controller
{
public function index() {
    $numbers = Number::all();
    return view('numbers', compact('numbers'));
}

}
