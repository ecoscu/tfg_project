<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<style>
    .privacy label {
        display: inline-block;
        margin: 0 10px; /* Espacio entre los radio buttons */
    }
</style>
<body>
    <div class="py-5 max-w-7xl text-justify">
        <div class="container">
            <div class="row justify-content-center">
                <form action="{{ route('lists.store') }}" method="post" class="col-md-6 mx-auto">
                    @csrf
                    <h1 style="font-family: 'figtree'; font-size:25px; font-weight: bold;" class="text-center">
                        NUEVA LISTA</h1>
                    <br>
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name"  required>
                    </div>
                    <div>
                        <label for="file">Descripcion:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                    </div>
                    <br>
                    <div class="privacy" style="text-align: center;">
                        <input type="radio" id="public" name="privacy" value="public"  required>
                        <label for="public">Public</label>
                        <input type="radio" id="private" name="privacy" value="private">
                        <label for="private">Private</label>
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
