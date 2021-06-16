@extends('back.layouts.master')
@section('title','Tum makaleler')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">makaleler</h6>
            <a href="{{route('admin.trashed.article')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-trash">Silinen makaleler</i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Fotoraf</th>
                        <th>Makale basligi</th>
                        <th>Kategory</th>
                        <th>Goruntulenme sayi</th>
                        <th>Olusturma tarixi</th>
                        <th>Durum</th>
                        <th>islemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>
                                <img src="{{$article->image}}" width="200">
                            </td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->getCategory->name}}</td>
                            <td>{{$article->hit}}</td>
                            <td>{{$article->created_at->diffForHumans()}}</td>
                            <td>
                                <input class="form-control" type="checkbox" checked data-toggle="toggle">
                            </td>
                            <td>
                                <a target="_blank" href="{{route('single',[$article->getCategory->slug,$article->slug])}}" title="Goruntule" class="btn btn-sm btn-success"><i class="fa fa-eye"></i>
                                </a>
                                <a href="{{route('admin.makaleler.edit',$article->id)}}" title="Duzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i> </a>
{{--                                <form method="post" action="{{route('admin.makaleler.destroy',$article->id)}}">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>--}}
{{--                                </form>--}}
                                <a href="{{route('admin.delete.article',$article->id)}}" type="submit" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
