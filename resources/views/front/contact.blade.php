@extends('front.layouts.master')
@section('bg','iletisim')
@section('title','Iletisim')
@section('content')
    <div class="col-lg-8 col-md-10 mx-auto">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p>Bizimle iletisime gece bilirsiniz</p>
        <form method="post" action="{{route('contact.post')}}">
            @csrf
            <div class="control-group">
                <div class="form-group  controls">
                    <label>Name</label>
                    <input type="text" value="{{old('name')}}" class="form-control" placeholder="Name" name="name"
                           required>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group  controls">
                    <label>Email Address</label>
                    <input type="email" value="{{old('email')}}" class="form-control" placeholder="Email Address"
                           name="email" required>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group col-xs-12  controls">
                    <label>Konu</label>
                    <select name="topic" class="form-control">
                        <option @if(old('topic')=="Bilgi") selected @endif>Bilgi</option>
                        <option @if(old('topic')=="Destek") selected @endif>Destek</option>
                        <option @if(old('topic')=="Genel") selected @endif>Genel</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group  controls">
                    <label>Mesajiniz</label>
                    <textarea rows="5" name="message" class="form-control"
                              placeholder="Mesajiniz">{{ old('message') }}</textarea>
                </div>
            </div>
            <br>
            <div id="success"></div>
            <button type="submit" class="btn btn-primary" id="sendMessageButton">gonder</button>
        </form>
    </div>
    <div class="col-md-4">
        <div class="card card-default">
            <div class="card-body">Panel control</div>
            Adres : bla bla bla
        </div>
    </div>
@endsection


