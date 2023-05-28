<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAllCategory(Request $request)
    {
        return CategoryModel::all();
    }

    public function getAllCategory2(Request $request)
    {
        $categories = CategoryModel::all();

        return view('main')->with(compact('categories'));
    }
}
