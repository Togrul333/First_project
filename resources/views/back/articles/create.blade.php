@extends('back.layouts.master')
@section('title','Makale olustur')
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
            <form method="post" action="{{route('admin.makaleler.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Makale basligi</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Makale kategory</label>
                    <select name="category" class="form-control" required>
                        <option value="">Secim yapiniz</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Makale fotorafi</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Makale icerigi</label>
                    <textarea name="content" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Makaleyi olustur</button>
                </div>
            </form>
        </div>
    </div>
@endsection
