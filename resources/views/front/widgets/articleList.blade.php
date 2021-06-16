@if(count($articles)>0)
@foreach($articles as $article)
    <div class="post-preview">
        <a href="{{route('single',[$article->getCategory->slug,$article->slug])}}">
            <h2 class="post-title">{{$article->title}}</h2>
            <img src="{{$article->image}}" alt="">
            <h3 class="post-subtitle">{!! \Illuminate\Support\Str::limit($article->content, 50) !!}</h3>
        </a>
        <p class="post-meta">

            Kategori:<a href="#!">{{$article->getCategory->name}}</a>
            <span class="float-right">{{$article->created_at->diffForHumans()}}</span>
        </p>
    </div>
    <hr>

@endforeach

<div class="customs-pagination">
    {{$articles->links()}}
</div>
@else
    <div class="aler alert-danger">
        <h1>Bu kategoriye aid yazi bulunamadi</h1>
    </div>
@endif
