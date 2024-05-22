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
            @if ($colorR == 'white')
                <i class="far fa-star rate" id="star-icon" onclick="showrate();"></i>
            @else
                <i class="far fa-star rate" id="star-icon" onclick="showrate();" style="color:{{ $colorR }};"></i>
            @endif

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

            @if ($colorP == 'white')
                <a href="{{ route('toggle.pending', ['content_id' => $content->id]) }}"">
                    <i class="far fa-clock" id="pending-icon"></i>
                </a>
            @else
                <a href="{{ route('toggle.pending', ['content_id' => $content->id]) }}"">
                    <i class="far fa-clock" id="pending-icon" style="color:{{ $colorP }};"></i>
                </a>
            @endif

            <i class="fas fa-list" id="list-icon" onclick="showlists();"></i>
        </div>
        <div class="stars" id="stars">
            @if ($UserRate == '1.00')
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '1']) }}" method="POST">
                    @csrf
                    <button class="but-star" style="color:yellow"><i class="far fa-star primera"
                            id="1"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '2']) }}" method="POST">
                    @csrf
                    <button class="but-star"><i class="far fa-star segunda" id="2"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '3']) }}" method="POST">
                    @csrf
                    <button class="but-star"><i class="far fa-star tercera" id="3"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '4']) }}" method="POST">
                    @csrf
                    <button class="but-star"><i class="far fa-star cuarta" id="4"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '5']) }}" method="POST">
                    @csrf
                    <button class="but-star"><i class="far fa-star quinta" id="5"></i></button>
                </form>
            @elseif ($UserRate == '2.00')
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '1']) }}" method="POST">
                    @csrf
                    <button class="but-star" style="color:yellow"><i class="far fa-star primera"
                            id="1"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '2']) }}" method="POST">
                    @csrf
                    <button class="but-star" style="color:yellow"><i class="far fa-star segunda"
                            id="2"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '3']) }}" method="POST">
                    @csrf
                    <button class="but-star"><i class="far fa-star tercera" id="3"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '4']) }}" method="POST">
                    @csrf
                    <button class="but-star"><i class="far fa-star cuarta" id="4"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '5']) }}" method="POST">
                    @csrf
                    <button class="but-star"><i class="far fa-star quinta" id="5"></i></button>
                </form>
            @elseif($UserRate == '3.00')
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '1']) }}" method="POST">
                    @csrf
                    <button class="but-star" style="color:yellow"><i class="far fa-star primera"
                            id="1"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '2']) }}" method="POST">
                    @csrf
                    <button class="but-star" style="color:yellow"><i class="far fa-star segunda"
                            id="2"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '3']) }}" method="POST">
                    @csrf
                    <button class="but-star" style="color:yellow"><i class="far fa-star tercera"
                            id="3"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '4']) }}" method="POST">
                    @csrf
                    <button class="but-star"><i class="far fa-star cuarta" id="4"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '5']) }}" method="POST">
                    @csrf
                    <button class="but-star"><i class="far fa-star quinta" id="5"></i></button>
                </form>
            @elseif($UserRate == '4.00')
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '1']) }}" method="POST">
                    @csrf
                    <button class="but-star" style="color:yellow"><i class="far fa-star primera"
                            id="1"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '2']) }}" method="POST">
                    @csrf
                    <button class="but-star" style="color:yellow"><i class="far fa-star segunda"
                            id="2"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '3']) }}" method="POST">
                    @csrf
                    <button class="but-star" style="color:yellow"><i class="far fa-star tercera"
                            id="3"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '4']) }}" method="POST">
                    @csrf
                    <button class="but-star" style="color:yellow"><i class="far fa-star cuarta"
                            id="4"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '5']) }}" method="POST">
                    @csrf
                    <button class="but-star"><i class="far fa-star quinta" id="5"></i></button>
                </form>
            @elseif($UserRate == '5.00')
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '1']) }}" method="POST">
                    @csrf
                    <button class="but-star" style="color:yellow"><i class="far fa-star primera"
                            id="1"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '2']) }}" method="POST">
                    @csrf
                    <button class="but-star" style="color:yellow"><i class="far fa-star segunda"
                            id="2"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '3']) }}" method="POST">
                    @csrf
                    <button class="but-star" style="color:yellow"><i class="far fa-star tercera"
                            id="3"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '4']) }}" method="POST">
                    @csrf
                    <button class="but-star" style="color:yellow"><i class="far fa-star cuarta"
                            id="4"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '5']) }}" method="POST">
                    @csrf
                    <button class="but-star" style="color:yellow"><i class="far fa-star quinta"
                            id="5"></i></button>
                </form>
            @else
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '1']) }}" method="POST">
                    @csrf
                    <button class="but-star"><i class="far fa-star primera" id="1"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '2']) }}" method="POST">
                    @csrf
                    <button class="but-star"><i class="far fa-star segunda" id="2"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '3']) }}" method="POST">
                    @csrf
                    <button class="but-star"><i class="far fa-star tercera" id="3"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '4']) }}" method="POST">
                    @csrf
                    <button class="but-star"><i class="far fa-star cuarta" id="4"></i></button>
                </form>
                <form action="{{ route('rate', ['content_id' => $content->id, 'rate' => '5']) }}" method="POST">
                    @csrf
                    <button class="but-star"><i class="far fa-star quinta" id="5"></i></button>
                </form>
            @endif
        </div>

        <div class="pop-lists">
            <div class="create-list">
                <a href="{{ route('createlist') }}">
                    <i class="fas fa-plus count" id="new-list-icon"></i>
                    Crear lista
                </a>
            </div>
            @foreach ($lists as $list)
                <div class="create-list">
                    <a
                        href="{{ route('list.addcontent', ['lista_id' => $list->id, 'content_id' => $content->id]) }}">{{ $list->name }}</a>
                </div>
            @endforeach
        </div>
    </div>
    <br>

    <div class="bottom-div">
        <div class="top-content">
            <h1>{{ $content->name }}</h1>
            <p class="rating">{{ $content->Rating }}/5<i class="far fa-star"></i></p>
        </div>
        <p>{{ $content->Sinopsis }}</p>
        <div class="Extras">
            <div class="genere">
                <p>Genero:</p>
                <p class="ex-tag">{{ $content->Genre }}</p>
            </div>
            <div class="platform">
                <p>Plataforma:</p>
                <p class="ex-tag">{{ $content->Platform }}</p>
            </div>
            <div class="see">
                <a href="{{$content->URL}}">
                    <p>Ver</p>
                </a>
            </div>
        </div>
        <div class="comment-section">
            @guest
            @else
                <hr>
                <h4>COMENTARIOS</h4>
                <form action="{{ route('comments.store') }}" method="post">
                    @csrf
                    <textarea class="comment-box" name="comment" placeholder="Write your comment..." required></textarea>
                    <input type="hidden" name="contenidos_id" value="{{ $content->id }}">
                    <div class="submit-comment">
                        <input type="submit" value="Publicar" class="summit-comment">
                    </div>
                </form>
            @endguest
            <div>
                @foreach ($comments as $comment)
                    <div class="comments-box">
                        <div class="comment-cross">
                            <div class="text-lg">{{ $comment->comment }}</div>
                            <a href="{{ route('comment.delete', ['comment_id' => $comment->id]) }}">
                                <div>
                                    @if ($comment->user_id == Auth::user()->id || Auth::user()->admin == '1')
                                        <i class="fas fa-times"></i>
                                    @endif
                                </div>
                            </a>
                        </div>

                        <div class="by-box">
                            <div>
                                <a
                                    href="{{ route('like-comment', ['comment_id' => $comment->id, 'content_id' => $content->id]) }}"><i
                                        class="far fa-heart" id="heart-icon"
                                        style="color: {{ $comment->color }}"></i></a>
                                @if ($comment->lcount > 0)
                                    {{ $comment->lcount }}
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
            stars.forEach(star => {
                star.classList.remove('active');
            });
        });
    });

    function showrate() {
        var stars = document.querySelectorAll('.stars');
        stars.forEach(star => {
            if (star.style.display === 'none' || star.style.display === '') {
                star.style.display = 'flex';

            } else {
                star.style.display = 'none';
            }
        });
    }

    function showlists() {
        var lists = document.querySelectorAll('.pop-lists');
        lists.forEach(list => {
            if (list.style.display === 'none' || list.style.display === '') {
                list.style.display = 'flex';
            } else {
                list.style.display = 'none';
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
