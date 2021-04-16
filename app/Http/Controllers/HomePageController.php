<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Article;

class HomePageController extends Controller
{
    public function index()
    {
        //print_r(Category::all()); die;
        $data['articles'] = Article::orderBy('created_at', 'DESC')->get();
        $data['categories'] = Category::inRandomOrder()->get();
        return view('front.homepage', $data);
    }

    public function single($category, $slug)
    {
        $category = Category::whereSlug($category)->first() ?? abort(403, 'boyle bir kategory bulunamadi');
        $article = Article::where('slug', $slug)->whereCategoryId($category->id)->first() ?? abort(403, 'boyle bir yazi bulunamadi');
        $article->increment('hit');
        $data['article'] = $article;
        $data['categories'] = Category::inRandomOrder()->get();
        return view('front.single', $data);
    }

    public function category($slug)
    {
        return $slug;
    }
}
