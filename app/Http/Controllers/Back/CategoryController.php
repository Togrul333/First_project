<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('back.categories.index', compact('categories'));
    }

    public function create(Request $request)
    {
       $category=new Category();
       $category->name=$request->get('category');
        $category->slug=$request->get('category');
        $category->save();
        toastr()->success('Kategory basariyla olusturuldu');
        return redirect()->back();
    }
}
