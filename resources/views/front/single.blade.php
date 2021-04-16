@extends('front.layouts.master')
@section('bg',$article->image)
@section('title',$article->title)
@section('content')
    <!-- Main Content -->
                <div class=" col-md-9 mx-auto">
                    {{$article->content}}<br> <br>

                    <h3 class="text-danger">okunma sayi <b>{{$article->hit}}</b></h3>
                </div>
    @include('front.widgets.categoryWidget')
@endsection


