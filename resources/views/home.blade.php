@extends('..layouts.navbar')

@section('content')
    <link rel="stylesheet" href="/css/home.css">

    <form action="{{ route('buscar') }}" method="GET" class="search">
        <input type="text" name="query" placeholder="Buscar..." class="search-input">
        <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
    </form>


    <h3 class="title1">{{ $title }}</h3>
    <div class="content-grid-flex">
        @foreach ($contents as $content)
            <div class="content-item-flex">
                <article>
                    <a href="{{ route('slug', $content->slug) }}">
                        <img class="content-image" src="data:image/jpeg;base64,{{ $content->base64Img }}"
                            alt="{{ $content->name }}">
                        <div class="content-details">
                            <div class="content-info">
                                <div class="content-name">{{ $content->name }}</div>
                                <div class="content-date">{{ $content->ReleaseDate }}</div>
                            </div>
                        </div>
                    </a>
                </article>
            </div>
        @endforeach
    </div>
@endsection





{{-- <div class="flex flex-wrap justify-evenly pb-5">
        @foreach ($contents as $content)
            <div style="background-image: url('data:image/jpeg;base64,{{ $content->base64Img }}');" class="text-left p-2">
                <h3 class="py-4 text-xl font-semibold">{{ $content->Name }}</h3>
                <ul>
                    <li>{{ $content->ReleaseDate }}</li>
                </ul>
                
            </div>
        @endforeach
    </div> --}}

{{-- <img class="cartel" src="data:image/jpeg;base64,{{ $content->base64Img }}" alt="Imagen"> --}}
