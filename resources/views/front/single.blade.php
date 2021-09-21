@extends('front.layouts.master')
@section('title',$article->title)
@section('bg',$article->image)
@section('content')
    <div class="col-md-8 mx-auto">
        {{$article->content}}
        <br>
        <span class="text-danger">Okundu : <b>{{$article->hit}}</b></span>
    </div>
    @include('front.widgets.categoryWidget')
@endsection

