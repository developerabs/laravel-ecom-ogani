<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\BrandModel;

class BrandController extends Controller
{
    public function index()
    {
        $data = BrandModel::orderBy('id', 'desc')->get();
        return view('Brand', [
            'data' => $data
        ]);
    }
    public function addBrand(Request $request)
    {
        $brand_name = $request->brand_name;
        $brand_slug = Str::slug($brand_name, '-');
        $result = BrandModel::insert([
            'brand_name' => $brand_name,
            'brand_slug' => $brand_slug,
        ]);
        if ($result == true) {
            return redirect('/brands');
        }else{
            return redirect('/brands');
        }
        
    }
    public function changeBrandStatus($id)
    {
        $data = BrandModel::where('id', '=', $id)->first();
        if ($data->status == 1) {
            BrandModel::where('id', '=', $id)->update(['status' => '0']);
            return redirect('/brands');
        } else {
            BrandModel::where('id', '=', $id)->update(['status' => '1']);
            return redirect('/brands');
        }
    }
    public function editBrand($id)
    {
        $data = BrandModel::where('id', '=', $id)->first();
        return view('pages.BrandEdit', [
            'data' => $data
        ]);
    }
    public function updateBrand(Request $request)
    {
        $brand_name = $request->brand_update;
        $brand_slug = Str::slug($brand_name, '-');
        $id = $request->id;
        $result = BrandModel::where('id', '=', $id)->update([
            'brand_name' =>$brand_name,
            'brand_slug' =>$brand_slug
        ]);
        if ($result == true) {
            return redirect('/brands');
        }else{
            return redirect('/brands');
        }
    }
    public function deleteBrand($id)
    {
        BrandModel::where('id', '=', $id)->delete();
        return redirect('/brands');
    }
}
