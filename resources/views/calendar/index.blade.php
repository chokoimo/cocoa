@extends('layout')
@section('title', 'カレンダー')
@section('content')
    {!!$cal_tag!!}
    <div class="row">
        <div class="col-md-11"><a href="{{ url('/reservation') }}">予約設定</a></div>
        <div class="col-md-1"><a href="{{ url('/customer/index') }}">お客一覧</a></div>
    </div>
    
    
    
@endsection