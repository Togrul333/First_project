@extends('front.layouts.master')
@section('bg',$page->image)
@section('title',$page->title)
@section('content')
    <div class="col-lg-8 col-md-10 mx-auto">
    {!! $page->content !!}
    </div>
@endsection


