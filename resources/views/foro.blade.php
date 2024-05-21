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
    <div class="radiofilter">
        <div class="radiooption">
            <input type="radio" id="comments" name="filteroption" value="comments">
            <label for="html">COMMENTS</label><br>
        </div>
        <div class="rightradio">
            <input type="radio" id="lists" name="filteroption" value="lists">
            <label for="css">LISTS</label><br>
        </div>
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
