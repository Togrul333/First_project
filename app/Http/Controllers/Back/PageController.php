<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('back.pages.index', compact('pages'));
    }

    public function orders(Request $request)
    {
        foreach ($request->get('page') as $key => $order){
            Page::where('id',$order)->update(['order'=>$key]);
        }
    }

    public function create()
    {
        return view('back.pages.create');
    }

    public function update($id)
    {
        $page = Page::findOrFail($id);
        return view('back.pages.update', compact('page'));
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'min:3',
            'image' => 'image|max:100'
        ]);

        $page = Page::findOrFail($id);
        $page->title = $request->get('title');
        $page->content = $request->get('content');
        $page->slug = $request->get('title');

        if ($request->hasFile('image')) {
            $imageName = $request->title . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imageName);
            $page->image = 'uploads/' . $imageName;
        }
        $page->save();
        toastr()->success('Basarili', 'Sayfa bawariyla guncelllendi');
        return redirect()->route('admin.pages.index');

    }

    public function delete($id)
    {
        $page = Page::find($id);
        if (File::exists($page->image)) {
            File::delete(public_path($page->image));
        }
        $page->delete();
        toastr()->success('Sayfa basariyla ve jostka silindi');
        return redirect()->route('admin.pages.index');
    }


    public function post(Request $request)
    {
        $request->validate([
            'title' => 'min:3',
            'image' => 'required|image|max:100'
        ]);
        $last = Page::orderBy('order', 'desc')->first();

        $page = new Page();
        $page->title = $request->get('title');
        $page->content = $request->get('content');
        $page->order = $last->order + 1;
        $page->slug = $request->get('title');

        if ($request->hasFile('image')) {
            $imageName = $request->title . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imageName);
            $page->image = 'uploads/' . $imageName;
        }
        $page->save();
        toastr()->success('Sayfa bawariyla olusturuldu');
        return redirect()->route('admin.pages.index');

    }
}




