@extends('..layouts.navbar')

@section('content')
    <link rel="stylesheet" href="/css/adminpanel.css">
    <h2 class="title">Control de Contenido</h2>
    <h6 class="subtitle">*Si se elimina un contenido, se borrara todo lo que tenga que ver con este.</h6>
    <div class="contentlist">
        @foreach ($contenidos as $contenido)
            <div class="contentparalel">
                <a href="{{ route('slug', $contenido->slug) }}" class="link">
                   <p>{{ $contenido->name }}</p> 
                </a>
            
                <a href="{{ route('deletecontent', ['content_id' => $contenido->id]) }}" class="close-icon">
                    <i class="fas fa-times"></i>
                </a>
            </div>
        @endforeach
    </div>
@endsection
