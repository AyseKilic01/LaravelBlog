@extends('front.layouts.master')
@section('title','Anasayfa')
@section('content')
    <div class="col-md-8 col-lg-8 col-xl-7">
    @include('front.widgets.articleWidget')
    <!-- Divider-->
        <hr class="my-4"/>
        <!-- Pager-->
        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts
                →</a></div>
    </div>

    @include('front.widgets.categoryWidget')
@endsection

