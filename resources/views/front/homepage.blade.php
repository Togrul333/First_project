@extends('front.layouts.master')
@section('title','blog new')
@section('content')
    <!-- Main Content -->
    <div class="col-md-9 mx-auto">
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
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
    </div>
    @include('front.widgets.categoryWidget')
@endsection

