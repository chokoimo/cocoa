@extends('layout')
@section('title', '予約設定')
@section('content')
    <h1>予約設定</h1>
    <a href="{{ url('/calendar') }}">カレンダーに戻る</a>
    <!-- 休日入力フォーム -->
    <form method="POST" action="/reservation"> 
    <div class="form-group">
    {{csrf_field()}}    
    <label for="day">日付[YYYY/MM/DD] </label>
    <input type="text" name="day" class="form-control" id="day" value="{{$data->day}}">
    <label for="instant">時間</label>
    <input type="text" name="instant" class="form-control" id="instant" value="{{$data->instant}}">
    <label for="customer_name">お客名</label>
    <input type="text" name="customer_name" class="form-control" id="customer_name" value="{{$data->customer_name}}">
    <label for="menu">メニュー</label>
    <input type="text" name="menu" class="form-control" id="menu" value="{{$data->menu}}">
    </div>
    <button type="submit" class="btn btn-primary">登録</button> 
    <input type="hidden" name="id" value="{{$data->id}}">
    </form>  
    <!-- 休日一覧表示 -->
    <table class="table">
    <thead>
    <tr>
    <th scope="col">日付</th>
    <th scope="col">時間</th>
    <th scope="col">お客名</th>
    <th scope="col">メニュー</th></th>
    <th scope="col">作成日</th>
    <th scope="col">更新日</th>
    </tr>
    </thead>
    <tbody>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @foreach($list as $val)
    <tr>
        <th scope="row"><a href="{{ url('/reservation/'.$val->id) }}">{{$val->day}}</a></th>
        <td>{{$val->instant}}</td>
        <th scope="row"><a href="{{ url('/customer/index/') }}">{{$val->customer_name}}</a></th>
        <td>{{$val->menu}}</td>
        <td>{{$val->created_at}}</td>
        <td>{{$val->updated_at}}</td>
        <td><form action="/reservation" method="post">
            <input type="hidden" name="id" value="{{$val->id}}">
            {{ method_field('delete') }}
            {{csrf_field()}} 
            <button class="btn btn-default" type="submit">削除</button>
        </form></td>
    </tr>
    @endforeach
    </tbody>
    </table>
    <script>
    $( function() {
        $( "#day" ).datepicker({dateFormat: 'yy-mm-dd'});
    } );
    </script>
    
    
    <div class="col-md-1"><a href="{{ url('/customer/index') }}">お客一覧</a></div>
@endsection