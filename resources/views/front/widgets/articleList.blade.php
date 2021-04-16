@if(count($articles)>0)
    @foreach($articles as $article)
        <div class="post-preview">
            <a href="{{route('single',[$article->getCategory->slug,$article->slug])}}">
                <h2 class="post-title">
                    {{$article->title}}
                </h2>
                <img src="{{$article->image}}" alt="">
                <h3 class="post-subtitle">
                    {{  $article->content}}
                </h3>
            </a>
            <p class="post-meta">Категория
                <a href="#"> {{$article->getCategory->name}}</a>
                <span class="float-right"> {{$article->created_at->diffForHumans()}}</span></p>
        </div>
    @endforeach

    <hr>
    <!-- Pager -->
    <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Oldeerdrgdgrgr Posts &rarr;</a>
    </div>
@else
    <div class="alert alert-danger">
        <h1>Bu kategoriye aid yazi bulunamadi</h1>
    </div>
@endif
