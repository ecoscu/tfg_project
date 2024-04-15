@extends('..layouts.navbar')

@section('content')
    <link rel="stylesheet" href="/css/content.css">
    <div>
        <div class="top-div" style="background-image: url(data:image/jpeg;base64,{{ base64_encode($content->Img) }});">

        </div>


    </div>
    <div class="content-img">
        <img class="content-image" src="data:image/jpeg;base64,{{ base64_encode($content->Img) }}" alt="{{ $content->name }}">
        <p class="fecha">{{$content->ReleaseDate}}</p>
        <div class="options">
            <i class="far fa-star" id="star-icon"></i>
            <a href="{{ route('toggle.favorite', ['content_id' => $content->id]) }}">
                <i class="far fa-heart" id="heart-icon"></i>
            </a>
            <i class="fas fa-list" id="list-icon"></i>
        </div>
    </div>

    <div class="bottom-div">
        <h1>{{$content->name}}</h1>
        <p>{{$content->Sinopsis}}</p>
        <div class="Extras">
            <div>
                Genere:
            </div>
            <div>
                {{$content->Genre}}
            </div>
        </div>
    </div>

    {{-- <div class="w-full h-full bg-no-repeat bg-cover">

        <h1>{{ $content->name }}</h1>
        <h3>{{ $content->Sinopsis }}</h3>

    </div> --}}
@endsection
