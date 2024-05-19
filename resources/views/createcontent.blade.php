<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<style>
</style>
<body style="background-color: rgb(34, 34, 34)">
    <div class="py-5 max-w-7xl text-justify" style="color: white">
        <div class="container">
            <div class="row justify-content-center">
                <form action="{{ route('content.store') }}" method="post" enctype="multipart/form-data"
                    class="col-md-6 mx-auto">
                    @csrf
                    <h1 style="font-family: 'figtree'; font-size:25px; font-weight: bold;" class="text-center">NUEVO CONTENIDO</h1>
                    <br>
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div>
                        <label for="file">Cartelera:</label>
                        <input type="file" name='file' id='file' accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="sinopsis">Sinopsis:</label>
                        <textarea class="form-control" id="sinopsis" name="sinopsis"></textarea>
                        
                    </div>
                    <div class="form-group">
                        <label for="type">Tipo:</label>
                        <select class="form-control" id="type" name="type">
                            <option value="Movie">Película</option>
                            <option value="Series">Serie</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="genre">Género:</label>
                        <select class="form-control" id="genre" name="genre">
                            <option value="Comedy">Comedia</option>
                            <option value="Drama">Drama</option>
                            <option value="Action">Acción</option>
                            <option value="Musical">Musical</option>
                            <option value="Horror">Terror</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="release_date">Fecha de Lanzamiento:</label>
                        <input type="date" class="form-control" id="release_date" name="release_date">
                    </div>
                    <div class="form-group">
                        <label for="platform">Plataforma:</label>
                        <select class="form-control" id="platform" name="platform">
                            <option value="NETFLIX">Netflix</option>
                            <option value="HBO">HBO</option>
                            <option value="PrimeVideo">Amazon Prime Video</option>
                            <option value="AppleTV">Apple TV</option>
                            <option value="Disney+">Disney+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rating">Calificación:</label>
                        <input type="number" step="0.1" class="form-control" id="rating" name="rating">
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                      </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
