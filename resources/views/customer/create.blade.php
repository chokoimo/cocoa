@extends('layout')
@section('title', 'お客新規')
@section('content')
    <h1>お客新規</h1>
    <a href="{{ url('/calendar') }}">カレンダーに戻る</a>
    <!-- 休日入力フォーム -->
    <form method="POST" action="/customer/create"> 
    <div class="form-group">
    {{csrf_field()}}    
    <label for="name">お客名</label>
    <input type="text" name="name" class="form-control" id="name" value="{{$data->name}}">
    <label for="description">住所</label>
    <input type="text" name="address" class="form-control" id="address" value="{{$data->address}}"> 
    <label for="description">電話</label>
    <input type="text" name="tel" class="form-control" id="tel" value="{{$data->tel}}"> 
    <label for="description">備考</label>
    <input type="text" name="memo" class="form-control" id="memo" value="{{$data->memo}}"> 
    </div>
    <button type="submit" class="btn btn-primary">登録</button> 
    <input type="hidden" name="id" value="{{$data->id}}">
    </form>
    <a href="{{ url('/customer/index') }}">お客一覧</a>
@endsection