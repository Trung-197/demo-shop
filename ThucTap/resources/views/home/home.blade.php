@extends('layouts.master')
@section('title')
    <title>Home page</title>
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection
@section('content')



<body>
@include('home.components.slider')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 padding-right">
                @include('home.components.category_tab')
                @include('home.components.recommend_product')
                @include('home.components.feature_product')
            </div>
            @include('components.sidebar')
        </div>
    </div>
</section>


@endsection
</body>
