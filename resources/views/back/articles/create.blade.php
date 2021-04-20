@extends('back.layouts.master')
@section('title','Tum makaleler')
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
        <form method="post" action="{{route('admin.makaleler.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Makale Basligi</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Makale Kategory</label>
                <select name="category" class="form-control" required>
                    <option value="">Secim yapiniz</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Makale Fotorafi</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Makale Icerigi</label>
                <textarea name="content" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Makaleyi olustur</button>
            </div>
        </form>
    </div>

@endsection

