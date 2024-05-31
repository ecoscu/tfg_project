@extends('..layouts.navbar')

@section('content')
    <link rel="stylesheet" href="/css/foro.css">
    <div class="comment">
        @guest
        @else
            <form action="{{ route('forocomment') }}" method="post">
                @csrf
                <textarea class="comment-box" name="comment" placeholder="Write a comment..." required></textarea>
                <input type="hidden">
                <div class="submit-comment">
                    <input type="submit" value="Publicar" class="summit-comment">
                </div>
            </form>
        @endguest
    </div>
    <hr>
    <h2 class="title">Listas Publicas</h2>
    <div class="list-grid-flex">
        @foreach ($publiclists as $list)
            <div class="list-item-flex">
                <a href="{{ route('list.show', ['lista_id' => $list->id]) }}"">
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

    <h2 class="title">Comentarios</h2>
    <div class="filtros">
        <form action="{{ route('foro', ['filter' => 'Fecha']) }}" method="GET">
            <button type="submit" class="filter fecha">Fecha<i class="fas fa-calendar"></i></button>
        </form>
        <form action="{{ route('foro', ['filter' => 'Likes']) }}" method="GET">
            <button type="submit" class="filter likes">Likes<i class="fas fa-thumbs-up"></i></button>
        </form>
    </div>
    @foreach ($foroComments as $comment)
        <div class="comments-box">
            <div class="comment-cross">
                <div class="text-lg">{{ $comment->comment }}</div>
                <a href="{{ route('forocommentdelete', ['comment_id' => $comment->id]) }}">
                    <div>
                        @if ($comment->user_id == Auth::user()->id || Auth::user()->admin == 1)
                            <i class="fas fa-times"></i>
                        @endif
                    </div>
                </a>
            </div>

            <div class="by-box">
                <div>
                    <a href="{{ route('likeforocomment', ['comment_id' => $comment->id, 'filter' => $filter]) }}"><i class="far fa-heart"
                            id="heart-icon" style="color: {{ $comment->color }}"></i></a>
                    @if ($comment->likes > 0)
                        {{ $comment->likes }}
                    @endif
                </div>
                <div>
                    <div>
                        By {{ $comment->user->name }}
                    </div>
                    <div>
                        {{ $comment->created_at->format('j F, Y') }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
