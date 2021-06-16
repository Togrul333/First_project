@extends('back.layouts.master')
@section('title',$page->title.'Sayfasini guncelle.')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li> {{$error}}</li>
                    @endforeach
                </div>
            @endif
            <form method="post" action="{{route('admin.pages.edit.post',$page->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Makale basligi</label>
                    <input type="text" value="{{$page->title}}" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Makale fotorafi</label><br>
                    <img src="{{asset($page->image)}}" class=" img-thumbnail rounded" width="300">
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Makale icerigi</label>
                    <textarea name="content" class="form-control" rows="4">{!! $page->content !!}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Makaleyi guncelle</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection
