<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CategoryModel;
use PhpParser\Node\Stmt\If_;

class CategoryController extends Controller
{
    public function index()
    {
        $data = CategoryModel::orderBy('id', 'desc')->get();
        return view('Category', [
            'data' => $data
        ]);
    }
    public function addCategorys(Request $request)
    {
        $category_name = $request->category_name;
        $category_slug = Str::slug($category_name, '-');
        CategoryModel::insert([
            'category_name' => $category_name,
            'category_slug' => $category_slug,
        ]);
        return redirect('/categorys');
    }
    public function changeStatus($id)
    {
        $data = CategoryModel::where('id', '=', $id)->first();
        if ($data->status == 1) {
            CategoryModel::where('id', '=', $id)->update(['status' => '0']);
            return redirect('/categorys');
        } else {
            CategoryModel::where('id', '=', $id)->update(['status' => '1']);
            return redirect('/categorys');
        }
    }
    public function editCat($id)
    {
        $data = CategoryModel::where('id', '=', $id)->first();
        return view('pages.CatEdit', [
            'data' => $data
        ]);
    }
    public function updateCategorys(Request $request)
    {
        $category_name = $request->category_update;
        $category_slug = Str::slug($category_name, '-');
        $id = $request->id;
        $result = CategoryModel::where('id', '=', $id)->update([
            'category_name' =>$category_name,
            'category_slug' =>$category_slug
        ]);
        if ($result == true) {
            return redirect('/categorys');
        }else{
            return redirect('/categorys');
        }
    }
    public function deleteCat($id)
    {
        CategoryModel::where('id', '=', $id)->delete();
        return redirect('/categorys');
    }
}
