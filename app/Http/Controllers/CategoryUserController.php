<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryUserController extends Controller
{
    public function show(Category $category)
    {
        $category->load('objects'); // Load related objects
        return view('categories.show', compact('category'));
    }
}
