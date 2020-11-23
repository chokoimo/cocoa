@extends('layout')
@section('title', 'お客様一覧')
@section('content')
    <h1>お客様一覧</h1>
    <a href="{{ url('/calendar') }}">カレンダーに戻る</a>
    <!-- 休日入力フォーム -->
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif  
    <table class="table">
    <thead>
    <tr>
    <th scope="col">名前</th>
    <th scope="col">住所</th>
    <th scope="col">電話</th>
    <th scope="col">備考</th>
    
    </tr>
    </thead>
    <tbody>
    @foreach($list as $val)
    <tr>
        <th scope="row"><a href="{{ url('/customer/index/'.$val->id) }}">{{$val->name}}</a></th>
        <td>{{$val->address}}</td>
        <td>{{$val->tel}}</td>
        <td>{{$val->memo}}</td>
        
        <td><form action="/customer/index" method="post">
            <input type="hidden" name="id" value="{{ $val->id }}">
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <button class="btn btn-default" type="submit">削除</button>
        </form></td>
    </tr>
    @endforeach
    </tbody>
    </table>
    <a href="{{ url('/customer/create') }}">お客新規</a>
@endsection