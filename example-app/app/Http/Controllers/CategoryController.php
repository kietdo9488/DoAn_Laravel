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

    public function getAllCate(Request $request)
    {
        $categoryList = CategoryModel::paginate(5);
        return view('managecategory', ['categoryList' => $categoryList]);
    }



    //Them san pham
    public function create(array $data)
    {
        // dd($data);
        $category = new CategoryModel();
        $category->category_name = $data['category_name'];
        $category->save();
    }


    //Custom them san pham
    public function customCategory(Request $request)
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
        $check = $this->create($data);
        return redirect("managecategory")->withSuccess('Add cuccessfully');
    }


    //Lay thong tin san pham cho edit
    public function getCategoryById(Request $request) {
        // dd($request->id);
        $category = CategoryModel::findOrFail($request->id);
        return view('editcategory')->with('category', $category);
    }


    public function getUpdateCategoryById(Request $Request) {
        // dd($Request->file('image'));
            CategoryModel::where('id', '=', $Request->id)->update(
                [
                    'category_name' => $Request->category_name,
                ]
            );

        return redirect('managecategory')->withSuccess('Login details are not valid');
    }

    public function delete(Request $Request) {
        CategoryModel::where('id', '=', $Request->id)->delete();
        return redirect("managecategory");
    }

    public function addCategory()
    {
        return view('addcategory');
    }
}
