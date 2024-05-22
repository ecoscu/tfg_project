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
                    <a href="{{ route ('list.show', ['lista_id' => $list->id]) }}"">
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

    <h2 class="title">Comments</h2>
    @foreach ($foroComments as $comment)
        <div class="comments-box">
            <div class="comment-cross">
                <div class="text-lg">{{ $comment->comment }}</div>
                <a href="{{ route('forocommentdelete', ['comment_id' => $comment->id]) }}">
                    <div>
                        @if ($comment->user_id == Auth::user()->id)
                            <i class="fas fa-times"></i>
                        @endif
                    </div>
                </a>
            </div>

            <div class="by-box">
                <div>
                    <a href=""><i class="far fa-heart" id="heart-icon"></i></a>
                    {{-- @if ($comment->lcount > 0)
                        {{ $comment->lcount }}
                    @endif --}}
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
