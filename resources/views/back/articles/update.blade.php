@extends('back.layouts.master')
@section('title',$article->title.'mekalesini guncelle')
@section('content')
    <div class="card-body">
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </div>
            @endif

        </div>
        <form method="post" action="{{route('admin.makaleler.update',$article->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>Makale Basligi</label>
                <input type="text"  value="{{$article->title}}" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Makale Kategory</label>
                <select name="category" class="form-control" required>
                    <option value="">Secim yapiniz</option>
                    @foreach($categories as $category)
                        <option @if($article->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Makale Fotorafi</label><br>
                <img src="{{asset('$article->image')}}" width="200">
                <input type="file" name="image" class="form-control" >
            </div>
            <div class="form-group">
                <label>Makale Icerigi</label>
                <textarea name="content" class="form-control" rows="4">{!! $article->content !!}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Makaleyi guncelle</button>
            </div>
        </form>
    </div>

@endsection

