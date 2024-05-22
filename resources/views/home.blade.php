@extends('..layouts.navbar')

@section('content')
    <link rel="stylesheet" href="/css/home.css">

    <form action="{{ route('buscar') }}" method="GET" class="search">
        <input type="text" name="query" placeholder="Buscar..." class="search-input">
        <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
    </form>

    <div class="headerline">

        <h3 class="title1">{{ $title }}</h3>
        @if ($title == 'All')
            <h5 class="title2" onclick="showfilters();">
                <p>Filtros</p><i class="fas fa-filter"></i>
            </h5>
        @endif

        <div class="filtros">
            <form action="{{ route('filter', ['filter' => 'A-Z']) }}" method="POST">
                @csrf
                <button type="submit" class="filter">A-Z</button>
            </form>
            <form action="{{ route('filter', ['filter' => 'Z-A']) }}" method="POST">
                @csrf
                <button type="submit" class="filter">Z-A</button>
            </form>
            {{-- <form action="" method="POST">
                @csrf --}}
            <div class="filter-down gen" onclick="showsubGenfilters();">
                <a class="filter">
                    <button class="down">Genero</button>
                    <i class="fas fa-chevron-down"></i>
                </a>
            </div>
            <div class="sub-filtros-gen">
                <form action="{{ route('filter', ['filter' => 'Comedy']) }}" method="POST">
                    @csrf
                    <button type="submit" class="filter">Comedy</button>
                </form>
                <form action="{{ route('filter', ['filter' => 'Drama']) }}" method="POST">
                    @csrf
                    <button type="submit" class="filter">Drama</button>
                </form>
                <form action="{{ route('filter', ['filter' => 'Horror']) }}" method="POST">
                    @csrf
                    <button type="submit" class="filter">Horror</button>
                </form>
                <form action="{{ route('filter', ['filter' => 'Action']) }}" method="POST">
                    @csrf
                    <button type="submit" class="filter">Action</button>
                </form>
                <form action="{{ route('filter', ['filter' => 'Musical']) }}" method="POST">
                    @csrf
                    <button type="submit" class="filter">Musical</button>
                </form>
            </div>
            {{-- </form> --}}
            {{-- <form action="" method="POST">
                @csrf --}}
            <div class="filter-down" onclick="showsubPlatfilters();">
                <a class="filter">
                    <button class="down">Plataforma</button>
                    <i class="fas fa-chevron-down"></i>
                </a>
            </div>
            <div class="sub-filtros-plat">
                <form action="{{ route('filter', ['filter' => 'NETFLIX']) }}" method="POST">
                    @csrf
                    <button type="submit" class="filter">NETFLIX</button>
                </form>
                <form action="{{ route('filter', ['filter' => 'HBO']) }}" method="POST">
                    @csrf
                    <button type="submit" class="filter">HBO</button>
                </form>
                <form action="{{ route('filter', ['filter' => 'Disney+']) }}" method="POST">
                    @csrf
                    <button type="submit" class="filter">Disney+</button>
                </form>
                <form action="{{ route('filter', ['filter' => 'PrimeVideo']) }}" method="POST">
                    @csrf
                    <button type="submit" class="filter">PrimeVideo</button>
                </form>
                <form action="{{ route('filter', ['filter' => 'AppleTV']) }}" method="POST">
                    @csrf
                    <button type="submit" class="filter">AppleTV</button>
                </form>
            </div>
            {{-- </form> --}}
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
                                    <div class="content-date" style="display: flex; justify-content: space-around;">
                                        <div>{{ $content->ReleaseDate }}</div> 
                                        <div>{{$content->Rating}} <i class="far fa-star" style="color: yellow"></i> </div>
                                    </div>
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

    function showsubGenfilters() {
        var subfilters = document.querySelectorAll('.sub-filtros-gen');
        subfilters.forEach(filter => {
            if (filter.style.display === 'none' || filter.style.display === '') {
                filter.style.display = 'block';
            } else {
                filter.style.display = 'none';
            }
        });
    }

    function showsubPlatfilters() {
        var subfilters = document.querySelectorAll('.sub-filtros-plat');
        subfilters.forEach(filter => {
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
