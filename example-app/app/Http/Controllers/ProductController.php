<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProduct(Request $request)
    {
        return ProductModel::all();
    }

    public function getAllProductAndPagination(Request $request)
    {
        $products = ProductModel::paginate(8);

        return view('index', compact('products'))->with('i',(request()->input('page', 1) -1) * 8);
    }

    public function searchByKeywords(Request $request){
        $search = $request->search;
        $resultSearch = ProductModel::getProductsBySearchKeyword($search);
        if($search == ""){
            $resultSearch = ProductModel::all()->sortByDesc('id');
        }
        return view('searchresult',['searchResults' => $resultSearch]);$search = $request->search;
        $resultSearch = ProductModel::getProductsBySearchKeyword($search);
        if($search == ""){
            $resultSearch = ProductModel::all()->sortByDesc('id');
        }
        return view('searchresult',['searchResults' => $resultSearch]);
    }
}
