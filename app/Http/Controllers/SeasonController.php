<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Season;

class SeasonController extends Controller
{
    public function index()
    {
        $seasons = Season::all();
        return view('seasons', compact('seasons'));
    }
}
