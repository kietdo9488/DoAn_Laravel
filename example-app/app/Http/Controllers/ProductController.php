<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Http\Controllers\CategoryController;

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

        $categories = CategoryController::getAllCategory();

        return view('index', ['categories'=>$categories, 'products'=>$products]);
    }

    public function searchByKeywords(Request $request){
        
        $search = $request->search;
        $resultSearch = ProductModel::getProductsBySearchKeyword($search);
        if($search == ""){
            $resultSearch = ProductModel::all()->sortByDesc('id');
        }

        // return view('searchresult',['searchResults' => $resultSearch]);$search = $request->search;

        $resultSearch = ProductModel::getProductsBySearchKeyword($search);
        if($search == ""){
            $resultSearch = ProductModel::all()->sortByDesc('id');
        }

        $categories = CategoryController::getAllCategory();
        
        return view('searchresult',['searchResults' => $resultSearch, 'categories'=>$categories]);
    }

    public function getProductByCategory(Request $Request) {
        ProductModel::where('id', '=', $Request->id)->delete();
        return redirect("manageproduct");
    }
}
