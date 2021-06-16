<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::orderBy('created_at', 'ASC')->get();
        return view('back.articles.index', compact('articles'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('back.articles.create', compact('categories'));

    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'min:3',
            'image' => 'required|image|max:100'
        ]);

        $article = new Article;
        $article->title = $request->get('title');
        $article->category_id = $request->get('category');
        $article->content = $request->get('content');
        $article->slug = $request->get('title');

        if ($request->hasFile('image')) {
            $imageName = $request->title . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imageName);
            $article->image = 'uploads/' . $imageName;
        }
        $article->save();
        toastr()->success('Basarili', 'Makale bawariyla olusturuldu');
        return redirect()->route('admin.makaleler.index');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('back.articles.update', compact('categories', 'article'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'min:3',
            'image' => 'image|max:100'
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->get('title');
        $article->category_id = $request->get('category');
        $article->content = $request->get('content');
        $article->slug = $request->get('title');

        if ($request->hasFile('image')) {
            $imageName = $request->title . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imageName);
            $article->image = 'uploads/' . $imageName;
        }
        $article->save();
        toastr()->success('Basarili', 'Makale bawariyla guncelllendi');
        return redirect()->route('admin.makaleler.index');

    }


    public function delete($id)
    {
        Article::find($id)->delete();
        toastr()->success('Makale basariyla silindi');
        return redirect()->route('admin.makaleler.index');
    }

    public function trashed()
    {
        $articles = Article::onlyTrashed()->orderBy('deleted_at', 'ASC')->get();
        return view('back.articles.trashed', compact('articles'));
    }

    public function recover($id)
    {
        Article::onlyTrashed()->find($id)->restore();
        toastr()->success('Makale basariyla kurtarildi');
        return redirect()->back();
    }

    public function hardDelete($id)
    {
        $article = Article::onlyTrashed()->find($id);
        if (File::exists($article->image)) {
            File::delete(public_path($article->image));
        }
        $article->forceDelete();
        toastr()->success('Makale basariyla ve jostka silindi');
        return redirect()->route('admin.makaleler.index');
    }

}
