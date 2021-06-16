<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class HomepageController extends Controller
{
    public function __construct()
    {
        view()->share('pages', Page::orderBy('order', 'ASC')->get());
        view()->share('categories', Category::withCount('articles as article_count')->inRandomOrder()->get());
    }

    public function index()
    {

        $data['articles'] = Article::orderBy('created_at', 'DESC')->paginate(2);
//        $data['categories'] = Category::inRandomOrder()->get();
        //       $data['categories'] = Category::withCount('articles as article_count')->inRandomOrder()->get();

        //  $data['pages'] = Page::orderBy('order', 'ASC')->get();

        return view('front.homepage', $data);
    }

    public function single($category, $slug)
    {
        $category = Category::whereSlug($category)->first() ?? abort(403, 'Hele bir kategory yoxdu');

        $article = Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403, 'Hele bir yazi yoxdu');

        //при каждом просмотре увеличет hit таким оброзом получим счет просмотров на страницу
        $article->increment('hit');

        $data['article'] = $article;
        //      $data['categories'] = Category::withCount('articles as article_count')->inRandomOrder()->get();

        //  $data['categories'] = Category::inRandomOrder()->get();
        return view('front.single', $data);
    }

    public function category($slug)
    {
        $category = Category::whereSlug($slug)->first() ?? abort(403, 'Hele bir kategory yoxdu');
        $data['category'] = $category;
        $data['articles'] = Article::where('category_id', $category->id)->orderBy('created_at', 'DESC')->paginate(2);
        //     $data['categories'] = Category::withCount('articles as article_count')->inRandomOrder()->get();
        return view('front.category', $data);
    }

    public function page($slug)
    {
        $page = Page::whereSlug($slug)->first() ?? abort(403, 'Boyle bir sayfa bulunamadi');
        $data['page'] = $page;
        // $data['pages'] = Page::orderBy('order', 'ASC')->get();
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
            'message' => 'required|min:10'
        ];
        $validate = Validator::make($request->post(), $rules);

        if ($validate->fails()) {
            return redirect()->route('contact')->withErrors($validate)->withInput();
        }

        Mail::send([],[], function ($message) use($request){
            $message->from('iletiwin@oglan.com','Blog sitesi');
            $message->to('iletiwin@oglan.com');
            $message->setBody('Mesaji gonderen:'.$request->name.'<br/>
                        Mesaji gonderen: Mail'.$request->email.'<br/>
                        Mesaji konusu:'.$request->topic.'<br/>
                        Mesaj:'.$request->message.'<br/>
                        Mesaji gonderilme tarixi:'.now().'<br/> ');
            $message->subject($request->name.'iletisimden messaj!');
        });

//
//        $contact = new Contact;
//        $contact->name = $request->get('name');
//        $contact->email = $request->get('email');
//        $contact->topic = $request->get('topic');
//        $contact->message = $request->get('message');
//        $contact->save();
        return redirect()->route('contact')->with('success', 'Mesajiniz bize iletildi. Tesekkur ederiz');
    }
}
