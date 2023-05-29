<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Http\Controllers\CategoryController;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function getAllProduct(Request $request)
    // {
    //     return ProductModel::all();
    // }

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
    //Lay tat ca product
    public function getAllProduct(Request $request)
    {
        $productList = ProductModel::paginate(5);
        return view('manageproduct', ['productList' => $productList]);
    }

    //Tao ten gia cho anh
    public function createNewName(Request $Request)
    {
        $newNameImg = "image" . time() . '.' . $Request->file('product_photo')->guessExtension();
        $Request->product_photo->move(base_path('./public/img'), $newNameImg);
        return $newNameImg;
    }


    //Them san pham
    public function create(array $data)
    {
        $product = new ProductModel();
        $product->product_name = $data['product_name'];
        $product->product_description = $data['product_description'];
        $product->product_price = $data['product_price'];
        $product->product_photo = $data['product_photo'];
        $product->idcategory = $data['idcategory'];
        $product->save();

        // dd($data);
        
        // return ProductModel::create([
        //     'product_name' => $data['product_name'],
        //     'product_description' => $data['product_description'],
        //     'product_price' => $data['product_price'],
        //     'product_photo' => $data['product_photo'],
        //     'idcategory' => $data['idcategory']
        // ]);
        
    }


    //Custom them san pham
    public function customProduct(Request $request)
    {

        
        // die;
        // $request->validate([
        //     'phone' => 'required|min:10',
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        //     'image' => 'required'
        // ]);



        $data = $request->all();
        // dd($data);
        $data['product_photo'] = $this->createNewName($request);
        $check = $this->create($data);
        return redirect("manageproduct")->withSuccess('Add cuccessfully');
    }


    //Lay thong tin san pham cho edit
    public function getProductById(Request $request) {
        // dd($request->id);
        $detail = ProductModel::findOrFail($request->id);
        return view('editproduct')->with('detail', $detail);
    }


    public function getUpdateProductById(Request $Request) {
        // dd($Request->file('image'));
        if ($Request->image == null) {
            ProductModel::where('id', '=', $Request->id)->update(
                [
                    'product_name' => $Request->product_name,
                    'product_description' => $Request->product_description,
                    'product_price' => $Request->product_price,
                    'idcategory' => $Request->idcategory
                ]
            );
        } else {
            $data = $Request->all();
            $data['image'] = $this->createNewName($Request);
            ProductModel::where('id', '=', $Request->id)->update(
                [
                    'product_name' => $data['product_name'],
                    'product_description' =>$data['product_description'],
                    'product_price' => $data['product_price'],
                    'idcategory' => $data['idcategory'],
                    'product_photo' =>$data['product_photo']
                ]
            );
        }
        return redirect('manageproduct')->withSuccess('Login details are not valid');
    }

    public function delete(Request $Request) {
        ProductModel::where('id', '=', $Request->id)->delete();
        return redirect("manageproduct");
    }

    public function addProduct()
    {
        return view('addproduct');
    }
}
