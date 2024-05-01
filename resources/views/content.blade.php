@extends('..layouts.navbar')

@section('content')
    <link rel="stylesheet" href="/css/content.css">
    <div>
        <div class="top-div" style="background-image: url(data:image/jpeg;base64,{{ base64_encode($content->Img) }});">

        </div>
    </div>
    <div class="content-img">
        <img class="content-image" src="data:image/jpeg;base64,{{ base64_encode($content->Img) }}" alt="{{ $content->name }}">
        <p class="fecha">{{ $content->ReleaseDate }}</p>
        <div class="options">
            <i class="far fa-star rate" id="star-icon" onclick="showrate();"></i>
            @if ($colorF == 'white')
                <a href="{{ route('toggle.favorite', ['content_id' => $content->id]) }}">
                    <i class="far fa-heart" id="heart-icon"></i>
                </a>
            @else
                <a href="{{ route('toggle.favorite', ['content_id' => $content->id]) }}">
                    <i class="far fa-heart" id="heart-icon" style="color:{{ $colorF }};"></i>
                </a>
            @endif

            @if ($colorW == 'white')
            <a href="{{ route('toggle.watched', ['content_id' => $content->id]) }}">
                <i class="far fa-eye" id="eye-icon"></i>
            </a>
            @else
            <a href="{{ route('toggle.watched', ['content_id' => $content->id]) }}">
                <i class="far fa-eye" id="eye-icon" style="color:{{ $colorW }};"></i>
            </a>
            @endif

            <i class="fas fa-list" id="list-icon"></i>
        </div>
        <br>
        <div class="stars" id="stars">
            <i class="far fa-star primera" id="1"></i>
            <i class="far fa-star segunda" id="2"></i>
            <i class="far fa-star tercera" id="3"></i>
            <i class="far fa-star cuarta" id="4"></i>
            <i class="far fa-star quinta" id="5"></i>
        </div>

    </div>

    <div class="bottom-div">
        <h1>{{ $content->name }}</h1>
        <p>{{ $content->Sinopsis }}</p>
        <div class="Extras">
            <div>
                Genere:
            </div>
            <div>
                {{ $content->Genre }}
            </div>
        </div>
    </div>
@endsection

<script>
    const stars = document.querySelectorAll('.stars i');

    stars.forEach((star, index) => {
        star.addEventListener('mouseover', () => {
            // Iluminar todas las estrellas hasta el índice actual incluyendo la actual
            for (let i = 0; i <= index; i++) {
                stars[i].classList.add('active');
            }
        });

        star.addEventListener('mouseout', () => {
            // Desiluminar todas las estrellas
            stars.forEach(star => {
                star.classList.remove('active');
            });
        });
    });

    function showrate() {
        var stars = document.querySelectorAll('.stars');
        stars.forEach(star => {
            if (star.style.display === 'none' || star.style.display === '') {
                star.style.display = 'flex'; // Asume que si está vacío, es porque CSS tiene display: none
            } else {
                star.style.display = 'none'; // Para alternar el estado
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.stars i');

        stars.forEach((star, index) => {
            star.addEventListener('mouseover', () => {
                for (let i = 0; i <= index; i++) {
                    stars[i].classList.add('active');
                }
            });

            star.addEventListener('mouseout', () => {
                stars.forEach(star => star.classList.remove('active'));
            });
        });
    });
</script>
