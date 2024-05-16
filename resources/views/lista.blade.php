@extends('..layouts.navbar')

@section('content')
    <link rel="stylesheet" href="/css/listas.css">
    <div class="header">
        <h1>{{ $lista->name }}</h1>
        @if (!empty($lista->description))
            <h5>{{ $lista->description }}</h5>
        @endif
    </div>
    <hr>
    <div class="content-grid-flex">
        @foreach ($listContents as $content)
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
                            @if ($lista->user_id == Auth::user()->id)
                                <a href="{{ route('list.removecontent', ['lista_id' => $lista->id, 'content_id' => $content->id]) }}">
                                    <div class="delete">
                                        <i class="fas fa-times"></i>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </a>
                </article>
            </div>
        @endforeach
    </div>
@endsection
