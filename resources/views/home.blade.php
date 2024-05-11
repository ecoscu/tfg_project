@extends('..layouts.navbar')

@section('content')
    <link rel="stylesheet" href="/css/home.css">

    <form action="{{ route('buscar') }}" method="GET" class="search">
        <input type="text" name="query" placeholder="Buscar..." class="search-input">
        <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
    </form>

    <div class="headerline">

        <h3 class="title1">{{ $title }}</h3>
        <h5 class="title2" onclick="showfilters();"><p>Filtros</p><i class="fas fa-filter"></i></h5>

        <div class="filtros">
            <form action="{{ route('filter', ['filter' => 'A-Z']) }}" method="POST">
                @csrf
                <button type="submit" class="filter">A-Z</button>
            </form>
            <form action="{{ route('filter', ['filter' => 'Z-A']) }}" method="POST">
                @csrf
                <button type="submit" class="filter">Z-A</button>
            </form>
            <form action="{{ route('filter', ['filter' => 'Recientes']) }}" method="POST">
                @csrf
                <button type="submit" class="filter">Mas Recientes</button>
            </form>
            <form action="{{ route('filter', ['filter' => 'Valoracion']) }}" method="POST">
                @csrf
                <button type="submit" class="filter">Valoracion</button>
            </form>
        </div>

    </div>
    <div class="content-grid-flex">
        @if ($contents->isEmpty())
            <p class="not-found">Lo sentimos no hemos encontrado contenidos con ese titulo.</p>
        @else
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
        @endif
    </div>
@endsection


<script>
    function showfilters() {
        var filters = document.querySelectorAll('.filtros');
        filters.forEach(filter => {
            if (filter.style.display === 'none' || filter.style.display === '') {
                filter.style.display = 'block';
            } else {
                filter.style.display = 'none';
            }
        });
    }
</script>


{{-- <a href="{{ route('filter', ['filter' => 'A-Z']) }}">
    <p class="filter">A-Z</p>
</a>
<a href="{{ route('filter', ['filter' => 'A-Z']) }}">
    <p class="filter">Z-A</p>
</a>
<a href="{{ route('filter', ['filter' => 'A-Z']) }}">
    <p class="filter">Mas Recientes</p>
</a>
<a href="{{ route('filter', ['filter' => 'A-Z']) }}">
    <p class="filter">Valoraciones</p>
</a> --}}
