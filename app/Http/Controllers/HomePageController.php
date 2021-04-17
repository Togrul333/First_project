<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Dotenv\Validator;
use App\Models\Category;

use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;

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

    public function contact()
    {
        return view('front.contact');
    }

    public function contactpost(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'topic' => 'required',
            'message' => 'required|min:10',
        ];

        $validate = \Illuminate\Support\Facades\Validator::make($request->post(), $rules);
        if ($validate->fails())
        {
            return redirect()->route('contact')->withErrors($validate)->withInput();
        }

        // почему не работает ?
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->topic = $request->topic;
        $contact->message = $request->message;
        $contact->save();
        // print_r($request->post());
        return redirect()->route('contact')->with('success', 'Mesajiniz bize iletildi Tesekkur etmirik');

    }
}
