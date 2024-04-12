<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/home.css">
    <title>Home</title>
</head>
<body>
    <h1 class="py-4 text-xl ">CONTENIDO</h1>

    <div class="flex flex-wrap justify-evenly pb-5">
        @foreach ($contents as $content)
            <div class="content-item">
                <div class="content-image" style="background-image: url('data:image/jpeg;base64,{{ $content->base64Img }}');"></div>
                <div class="content-details">
                    <h3 class="content-name">{{ $content->Name }} <span class="content-date">{{ $content->ReleaseDate }}</span></h3>
                </div>
            </div>
        @endforeach
    </div>
    

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>


    {{-- <div class="flex flex-wrap justify-evenly pb-5">
        @foreach ($contents as $content)
            <div style="background-image: url('data:image/jpeg;base64,{{ $content->base64Img }}');" class="text-left p-2">
                <h3 class="py-4 text-xl font-semibold">{{ $content->Name }}</h3>
                <ul>
                    <li>{{ $content->ReleaseDate }}</li>
                </ul>
                
            </div>
        @endforeach
    </div> --}}

    <a href="{{ route('createcontent') }}" class="btn btn-primary">Añadir Contenido</a>
</body>
</html>

{{-- <img class="cartel" src="data:image/jpeg;base64,{{ $content->base64Img }}" alt="Imagen"> --}}
