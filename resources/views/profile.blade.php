@extends('..layouts.navbar')

@section('content')
    <link rel="stylesheet" href="/css/profile.css">
    <div>
        <h2 class="title1">Your Lists</h2>
        <div class="list-grid-flex">
            <div class="list-item-flex">
                <a href="{{ route('createlist') }}">
                    <div class="list-details">
                        <i class="fas fa-plus count" id="new-list-icon"></i>
                        <p>Crear lista</p>
                    </div>
                </a>
            </div>
            @foreach ($lists as $list)
                <div class="list-item-flex">
                    <a href="">
                        <div class="list-details">
                            <p>{{ $list->name }}</p>
                            @if ($list->privacy == 1)
                                <i class="fas fa-globe-europe"></i>
                            @else
                                <i class="fas fa-lock"></i>
                            @endif
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <hr>
        <h2 class="title1">Your Favourites</h2>
        <div class="content-grid-flex">
            @foreach ($favourites as $favorite)
                <div class="content-item-flex">
                    <article>
                        <a href="{{ route('slug', $favorite->slug) }}">
                            <img class="content-image" src="data:image/jpeg;base64,{{ $favorite->base64Img }}"
                                alt="{{ $favorite->name }}">
                            <div class="content-details">
                                <div class="content-info">
                                    <div class="content-name">{{ $favorite->name }}</div>
                                    <div class="content-date">{{ $favorite->ReleaseDate }}</div>
                                </div>
                            </div>
                        </a>
                    </article>
                </div>
            @endforeach
        </div>
        <hr>
        <h2 class="title1">Yet to Watch</h2>
        <div class="content-grid-flex">
        </div>
        <hr>
        <h2 class="title1">You Watched</h2>
        <div class="content-grid-flex">
            @foreach ($watched as $watch)
                <div class="content-item-flex">
                    <article>
                        <a href="{{ route('slug', $watch->slug) }}">
                            <img class="content-image" src="data:image/jpeg;base64,{{ $watch->base64Img }}"
                                alt="{{ $watch->name }}">
                            <div class="content-details">
                                <div class="content-info">
                                    <div class="content-name">{{ $watch->name }}</div>
                                    <div class="content-date">{{ $watch->ReleaseDate }}</div>
                                </div>
                            </div>
                        </a>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
@endsection
