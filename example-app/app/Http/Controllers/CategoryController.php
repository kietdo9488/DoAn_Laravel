<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public static function getAllCategory()
    {
        return CategoryModel::all();
    }

    public static function getAllCategory2()
    {
        $categories = CategoryModel::all();

        return view('main', ['categories'=>$categories]);
    }
}
