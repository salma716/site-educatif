<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Letter;

class LetterController extends Controller
{
public function index() {
    $letters = Letter::all();
    return view('letters', compact('letters'));
}

}
