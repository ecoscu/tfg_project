<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WatchLister</title>

    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <header>
        <nav>
            <div class="menu">
                <i class="fas fa-bars toggle-button"></i>
            </div>
            <ul>
                <li><a href={{ route('dashboard') }}><i class="fas fa-home nav_ico"></i></a></li>
                <li><a href={{ route('content.movies') }}><i class="fas fa-film nav_ico"></i>Movies</a></li>
                <li><a href={{ route('content.series') }}><i class="fas fa-tv nav_ico"></i>TV Shows</a></li>
                <li><a href="#"><i class="fas fa-rocket nav_ico"></i> Foro</a></li>
                <li><a href={{ route('profile.page') }}><i class="fas fa-user-alt nav_ico"></i></a></li>

                @if (Auth::user()->name == 'admin')
                    <li>
                        <a href={{ route('createcontent') }}>Añadir Contenido</a>
                    </li>
                @endif
                

                <li>
                    <a class="hover:text-purple-900" href="{{ route('logout') }}" title="logout"
                        class="no-underline hover:underline"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="fas fa-sign-out-alt"></i></a>
                    <form class="hide" id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

</body>
<script>
    document.querySelector('.toggle-button').addEventListener('click', function() {
        document.querySelector('nav ul').classList.toggle('active');
    });

    
    const toggleButton = document.querySelector('.toggle-button');
    const contentImg = document.querySelector('.content-img');

    toggleButton.addEventListener('click', function() {
        
        toggleButton.classList.toggle('active');

        if (toggleButton.classList.contains('active')) {
            contentImg.style.top = '610px';
        } else {
            contentImg.style.top = ''; 
        }
    });
</script>

</html>
