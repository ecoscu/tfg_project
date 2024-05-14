<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Contenido;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $imgcars = public_path('img/cars_.jpg');
        $imagencars = file_get_contents($imgcars);
        $imgGrays = public_path('img/grey_s_anatomyjpg.jpg');
        $imagengray = file_get_contents($imgGrays);
        $imggot = public_path('img/GOT.jpg');
        $imagenGOT = file_get_contents($imggot);
        $imgconjuring = public_path('img/Conjuring.jpg');
        $imagenConj = file_get_contents($imgconjuring);
        $imgahs = public_path('img/ahs.png');
        $imagenahs = file_get_contents($imgahs);
        $imghg = public_path('img/hunger-games.jpg');
        $imagenhg = file_get_contents($imghg);

        $imgt100 = public_path('img/The_100.jpg');
        $imagent100 = file_get_contents($imgt100);
        $imgpapel = public_path('img/la_casa_de_papel.jpg');
        $imagentpapel = file_get_contents($imgpapel);
        $imgstranger = public_path('img/stanger.jpg');
        $imagenstranger = file_get_contents($imgstranger);
        
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'admin' => true,
            'password' => bcrypt('1234'),
        ]);

        Contenido::create([
            'name' => 'Cars',
            'slug' => 'cars',
            'Img' => $imagencars,
            'Sinopsis' => 'El aspirante a campeón de carreras Rayo McQueen parece que está a punto de conseguir el éxito. Su actitud arrogante se desvanece cuando llega a una pequeña comunidad olvidada que le enseña las cosas importantes de la vida que había olvidado.',
            'Type' => 'Movie',
            'Genre' => 'Action',
            'ReleaseDate' => '2005-01-20',
            'Platform' => 'Disney+'
        ]);

        Contenido::create([
            'name' => 'Gray´s Anatomy',
            'slug' => 'gray-s-anatomy',
            'Img' => $imagengray,
            'Sinopsis' => 'El drama médico de alta intensidad sigue a Meredith Gray y el equipo de médicos del Gray Sloan Memorial que se enfrentan a diario a decisiones de vida o muerte. Buscan consuelo el uno del otro y, a veces, algo más que amistad. Juntos descubren que ni la medicina ni las relaciones se pueden definir en blanco y negro.',
            'Type' => 'Series',
            'Genre' => 'Drama',
            'ReleaseDate' => '2005-06-28',
            'Platform' => 'Disney+'
        ]);

        Contenido::create([
            'name' => 'Game of Thrones',
            'slug' => 'game-of-thornes',
            'Img' => $imagenGOT,
            'Sinopsis' => 'Se sitúa en un mundo ficticio con elementos fantásticos, como dragones y poderes, pero también otros muy reales como son las luchas de poder, los enfrentamientos políticos, las traiciones y la continua guerra por el trono que gobierna los siete reinos de Poniente.',
            'Type' => 'Series',
            'Genre' => 'Drama',
            'ReleaseDate' => '2011-04-17',
            'Platform' => 'HBO'
        ]);
        
        Contenido::create([
            'name' => 'The Conjuring',
            'slug' => 'the-conjuring',
            'Img' => $imagenConj,
            'Sinopsis' => 'Narra los encuentros sobrenaturales que vivió la familia Perron en su casa de Rhode Island a principios de los 70. Ed y Lorraine Warren, investigadores de renombre en el mundo de los fenómenos paranormales, acuden a la llamada de una familia aterrorizada por la presencia en su granja de un ser maligno.',
            'Type' => 'Movie',
            'Genre' => 'Horror',
            'ReleaseDate' => '2013-10-18',
            'Platform' => 'PrimeVideo'
        ]);

        Contenido::create([
            'name' => 'The Hunger Games',
            'slug' => 'the-hunger-games',
            'Img' => $imagenhg,
            'Sinopsis' => 'Se sitúa en un mundo ficticio con elementos fantásticos, como dragones y poderes, pero también otros muy reales como son las luchas de poder, los enfrentamientos políticos, las traiciones y la continua guerra por el trono que gobierna los siete reinos de Poniente.',
            'Type' => 'Movie',
            'Genre' => 'Drama',
            'ReleaseDate' => '2011-04-17',
            'Platform' => 'HBO'
        ]);

        Contenido::create([
            'name' => 'Stranger Things',
            'slug' => 'stranger-things',
            'Img' => $imagenstranger,
            'Sinopsis' => 'Se sitúa en un mundo ficticio con elementos fantásticos, como dragones y poderes, pero también otros muy reales como son las luchas de poder, los enfrentamientos políticos, las traiciones y la continua guerra por el trono que gobierna los siete reinos de Poniente.',
            'Type' => 'Series',
            'Genre' => 'Drama',
            'ReleaseDate' => '2011-04-17',
            'Platform' => 'HBO'
        ]);

        Contenido::create([
            'name' => 'The 100',
            'slug' => 'the-100',
            'Img' => $imagent100,
            'Sinopsis' => 'Se sitúa en un mundo ficticio con elementos fantásticos, como dragones y poderes, pero también otros muy reales como son las luchas de poder, los enfrentamientos políticos, las traiciones y la continua guerra por el trono que gobierna los siete reinos de Poniente.',
            'Type' => 'Series',
            'Genre' => 'Drama',
            'ReleaseDate' => '2011-04-17',
            'Platform' => 'HBO'
        ]);

        Contenido::create([
            'name' => 'La Casa De Papel',
            'slug' => 'la-casa-de-papel',
            'Img' => $imagentpapel,
            'Sinopsis' => 'Se sitúa en un mundo ficticio con elementos fantásticos, como dragones y poderes, pero también otros muy reales como son las luchas de poder, los enfrentamientos políticos, las traiciones y la continua guerra por el trono que gobierna los siete reinos de Poniente.',
            'Type' => 'Series',
            'Genre' => 'Drama',
            'ReleaseDate' => '2011-04-17',
            'Platform' => 'HBO'
        ]);

        Contenido::create([
            'name' => 'American Horror Story',
            'slug' => 'game-of-thornes',
            'Img' => $imagenahs,
            'Sinopsis' => 'Se sitúa en un mundo ficticio con elementos fantásticos, como dragones y poderes, pero también otros muy reales como son las luchas de poder, los enfrentamientos políticos, las traiciones y la continua guerra por el trono que gobierna los siete reinos de Poniente.',
            'Type' => 'Series',
            'Genre' => 'Horror',
            'ReleaseDate' => '2011-04-17',
            'Platform' => 'HBO'
        ]);
    }
}
