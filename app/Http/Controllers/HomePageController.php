<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Article;
use App\Models\Page;

class HomePageController extends Controller
{
    public function __construct()
    {
        view()->share('pages', Page::orderBy('order', 'ASC')->get());
        view()->share('categories', Category::inRandomOrder()->get());
    }

    public function index()
    {
        //print_r(Category::all()); die;
        $data['articles'] = Article::orderBy('created_at', 'DESC')->paginate(2);
       // $data['categories'] = Category::inRandomOrder()->get();
     //   $data['pages'] = Page::orderBy('order', 'ASC')->get();
        return view('front.homepage', $data);
    }

    public function single($category, $slug)
    {
        $category = Category::whereSlug($category)->first() ?? abort(403, 'boyle bir kategory bulunamadi');
        $article = Article::where('slug', $slug)->whereCategoryId($category->id)->first() ?? abort(403, 'boyle bir yazi bulunamadi');
        $article->increment('hit');
        $data['article'] = $article;
     //   $data['categories'] = Category::inRandomOrder()->get();
        return view('front.single', $data);
    }

    public function category($slug)
    {
        $category = Category::whereSlug($slug)->first() ?? abort(403, 'boyle bir kategory bulunamadi');
        $data['category'] = $category;
        $data['articles'] = Article::where('category_id', $category->id)->orderBy('created_at', 'DESC')->get();
       // $data['categories'] = Category::inRandomOrder()->get();
        return view('front.category', $data);
    }

    public function page($slug)
    {
        $page = Page::whereSlug($slug)->first() ?? abort(403, 'boyle bir sayfa bulunamadi');
        $data['page'] = $page;
     //   $data['pages'] = Page::orderBy('order', 'ASC')->get();
        return view('front.page', $data);
    }
}
