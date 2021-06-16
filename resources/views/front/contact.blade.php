@extends('front.layouts.master')
@section('title','iletisim')
@section('bg','https://ae01.alicdn.com/kf/HTB1xNHLsQ9WBuNjSspeq6yz5VXaV/Elephant-ev-telefonu.jpg')
@section('content')
    <div class="col-md-8 ">
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
        <p>Bizimle elaqe saxliya bilersiz</p>
        <form method="post" action="{{route('contact.post')}}">
            @csrf
            <div class="control-group">
                <div class="form-group  controls">
                    <label>Ad Soyad</label>
                    <input class="form-control" value="{{old('name')}}" name="name" type="text"
                           placeholder="Ad Soyadiniz" required/>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group  controls">
                    <label>Email Adresi</label>
                    <input class="form-control" value="{{old('email')}}" name="email" type="email"
                           placeholder="Email Address" required/>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group col-xs-12 controls">
                    <label>Konu</label>
                    <select class="form-control" name="topic">
                        <option @if(old('topic')=="Bilgi") selected @endif>Bilgi</option>
                        <option @if(old('topic')=="Destek") selected @endif>Destek</option>
                        <option @if(old('topic')=="Genel") selected @endif>Genel</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group  controls">
                    <label>Message</label>
                    <textarea class="form-control" name="message" rows="5" placeholder="Mesajiniz"
                              required>{{old('message')}}</textarea>
                </div>
            </div>
            <br/>
            <div id="success"></div>
            <button class="btn btn-primary" id="sendMessageButton" type="submit">Send</button>
        </form>
    </div>
    <div class="col-md-4">
        <div class="card-body">
            adres:bjbafbf
        </div>
    </div>
@endsection
