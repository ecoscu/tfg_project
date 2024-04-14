@extends('..layouts.navbar')

@section('content')
    <link rel="stylesheet" href="/css/content.css">
    <div>
        <div class="top-div" style="background-image: url(data:image/jpeg;base64,{{ base64_encode($content->Img) }});">

        </div>


    </div>
    <div class="content-img">
        <img class="content-image" src="data:image/jpeg;base64,{{ base64_encode($content->Img) }}" alt="{{ $content->name }}">
        <div class="options">
            <i class="far fa-star" id="star-icon"></i>
            <i class="far fa-heart" id="heart-icon"></i>
            <i class="fas fa-list" id="list-icon"></i>
        </div>
    </div>

    <div class="bottom-div">

    </div>

    {{-- <div class="w-full h-full bg-no-repeat bg-cover">

        <h1>{{ $content->name }}</h1>
        <h3>{{ $content->Sinopsis }}</h3>

    </div> --}}
@endsection
