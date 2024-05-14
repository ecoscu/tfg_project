@extends('..layouts.navbar')

@section('content')
<link rel="stylesheet" href="/css/foro.css">
    <div class="comment">
        @guest
        @else
            <form action="{{ route('comments.store') }}" method="post">
                @csrf
                <textarea class="comment-box" name="comment" placeholder="Add a comment..." required></textarea>
                <input type="hidden">
                <div class="submit-comment">
                    <input type="submit" value="Publicar" class="summit-comment">
                </div>
            </form>
        @endguest
    </div>
    <hr>
    <div>
        <h2>Comments</h2>
    </div>
@endsection