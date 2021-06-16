@extends('back.layouts.master')
@section('title','Tum Sayfalar')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">makaleler</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Siralama</th>
                        <th>Fotoraf</th>
                        <th>Makale basligi</th>
                        <th>Durum</th>
                        <th>islemler</th>
                    </tr>
                    </thead>
                    <tbody id="orders">
                    @foreach($pages as $page)
                        <tr id="page_{{$page->id}}">
                            <td style="width: 5px" class="text-center"><i class="fa fa-arrows-alt-v fa-2x handle" style="cursor:move"></i></td>
                            <td>
                                <img src="{{$page->image}}" width="200">
                            </td>
                            <td>{{$page->title}}</td>
                            <td></td>
                            <td>
                                <a target="_blank" href="{{route('page',$page->slug)}}" title="Goruntule" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                <a href="{{route('admin.pages.edit',$page->id)}}" title="Duzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i> </a>
                                <a href="{{route('admin.pages.delete',$page->id)}}" type="submit" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.13.0/Sortable.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        $('#orders').sortable({
        handle:'.handle',
            update:function(){
            var siralama = $('#orders').sortable('serialize');
            $.get("{{route('admin.pages.orders')}}?"+siralama,function (data,status){})
            }
        });

        const name="togrul";
        let age=27;
        console.log(typeof name,typeof age);

    </script>
@endsection
