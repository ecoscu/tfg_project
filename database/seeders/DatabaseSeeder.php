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
        $imgendgame = public_path('img/avengers_endgame.jpg');
        $imagenendgame = file_get_contents($imgendgame);
        $imgdune = public_path('img/Dune.jpg');
        $imagendune = file_get_contents($imgdune);
        $imghdragon = public_path('img/house-of-the-dragon_916.jpg');
        $imagenhdragon = file_get_contents($imghdragon);
        $imgit = public_path('img/it.jpg');
        $imagenit = file_get_contents($imgit);
        $imgpperfect = public_path('img/pitchperfect.jpg');
        $imagenpperfect = file_get_contents($imgpperfect);
        $imgshowman = public_path('img/showman.jpg');
        $imagenshowman = file_get_contents($imgshowman);
        $imgtalktome= public_path('img/talktome.jpg');
        $imagentalktome = file_get_contents($imgtalktome);
        $imgzombie= public_path('img/Bienvenidos_a_Zombieland.jpg');
        $imagenzombie= file_get_contents($imgzombie);
        $imgbadmums= public_path('img/badmums.jpg');
        $imagenbadmums = file_get_contents($imgbadmums);
        $imgcuron= public_path('img/Curon.jpg');
        $imagencuron= file_get_contents($imgcuron);
        $imgmammamia= public_path('img/Mamma_Mia.jpg');
        $imagenmammamia= file_get_contents($imgmammamia);
        $imgtokyodrive= public_path('img/faftokyo.jpg');
        $imagentokyodrive= file_get_contents($imgtokyodrive);
        $imgmazerunner= public_path('img/maze_runner.jpg');
        $imagenmazerunner= file_get_contents($imgmazerunner);
        $imgpaquita= public_path('img/paquita.jpg');
        $imagenpaquita= file_get_contents($imgpaquita);
        
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
            'Platform' => 'Disney+',
            'URL' => 'https://www.disneyplus.com/browse/entity-9c1b0ec2-2e4e-4717-89fb-bdf3a45523df'
        ]);

        Contenido::create([
            'name' => 'Gray´s Anatomy',
            'slug' => 'gray-s-anatomy',
            'Img' => $imagengray,
            'Sinopsis' => 'El drama médico de alta intensidad sigue a Meredith Gray y el equipo de médicos del Gray Sloan Memorial que se enfrentan a diario a decisiones de vida o muerte. Buscan consuelo el uno del otro y, a veces, algo más que amistad. Juntos descubren que ni la medicina ni las relaciones se pueden definir en blanco y negro.',
            'Type' => 'Series',
            'Genre' => 'Drama',
            'ReleaseDate' => '2005-06-28',
            'Platform' => 'Disney+',
            'URL' => 'https://www.disneyplus.com/browse/entity-3db0cb33-5346-4b09-88e4-828dcc4916fe'
        ]);

        Contenido::create([
            'name' => 'Game of Thrones',
            'slug' => 'game-of-thornes',
            'Img' => $imagenGOT,
            'Sinopsis' => 'Se sitúa en un mundo ficticio con elementos fantásticos, como dragones y poderes, pero también otros muy reales como son las luchas de poder, los enfrentamientos políticos, las traiciones y la continua guerra por el trono que gobierna los siete reinos de Poniente.',
            'Type' => 'Series',
            'Genre' => 'Drama',
            'ReleaseDate' => '2011-04-17',
            'Platform' => 'HBO',
            'URL' => 'https://play.max.com/show/4f6b4985-2dc9-4ab6-ac79-d60f0860b0ac'
        ]);
        
        Contenido::create([
            'name' => 'The Conjuring',
            'slug' => 'the-conjuring',
            'Img' => $imagenConj,
            'Sinopsis' => 'Narra los encuentros sobrenaturales que vivió la familia Perron en su casa de Rhode Island a principios de los 70. Ed y Lorraine Warren, investigadores de renombre en el mundo de los fenómenos paranormales, acuden a la llamada de una familia aterrorizada por la presencia en su granja de un ser maligno.',
            'Type' => 'Movie',
            'Genre' => 'Horror',
            'ReleaseDate' => '2013-10-18',
            'Platform' => 'HBO',
            'URL' => 'https://play.max.com/movie/d1b146e9-7426-4463-804d-3ca656e38492'
        ]);

        Contenido::create([
            'name' => 'The Hunger Games',
            'slug' => 'the-hunger-games',
            'Img' => $imagenhg,
            'Sinopsis' => 'Se sitúa en un mundo ficticio con elementos fantásticos, como dragones y poderes, pero también otros muy reales como son las luchas de poder, los enfrentamientos políticos, las traiciones y la continua guerra por el trono que gobierna los siete reinos de Poniente.',
            'Type' => 'Movie',
            'Genre' => 'Drama',
            'ReleaseDate' => '2011-04-17',
            'Platform' => 'HBO',
            'URL' => 'https://play.max.com/movie/c63819d8-de84-4e74-bd59-29948bc673e3'
        ]);

        Contenido::create([
            'name' => 'Stranger Things',
            'slug' => 'stranger-things',
            'Img' => $imagenstranger,
            'Sinopsis' => 'Se sitúa en un mundo ficticio con elementos fantásticos, como dragones y poderes, pero también otros muy reales como son las luchas de poder, los enfrentamientos políticos, las traiciones y la continua guerra por el trono que gobierna los siete reinos de Poniente.',
            'Type' => 'Series',
            'Genre' => 'Drama',
            'ReleaseDate' => '2016-6-15',
            'Platform' => 'NETFLIX',
            'URL' => 'https://www.netflix.com/title/80057281'
        ]);

        Contenido::create([
            'name' => 'The 100',
            'slug' => 'the-100',
            'Img' => $imagent100,
            'Sinopsis' => 'Se sitúa en un mundo ficticio con elementos fantásticos, como dragones y poderes, pero también otros muy reales como son las luchas de poder, los enfrentamientos políticos, las traiciones y la continua guerra por el trono que gobierna los siete reinos de Poniente.',
            'Type' => 'Series',
            'Genre' => 'Drama',
            'ReleaseDate' => '2014-03-19',
            'Platform' => 'NETFLIX',
            'URL' => 'https://www.netflix.com/title/70283264'
        ]);

        Contenido::create([
            'name' => 'La Casa De Papel',
            'slug' => 'la-casa-de-papel',
            'Img' => $imagentpapel,
            'Sinopsis' => 'Se sitúa en un mundo ficticio con elementos fantásticos, como dragones y poderes, pero también otros muy reales como son las luchas de poder, los enfrentamientos políticos, las traiciones y la continua guerra por el trono que gobierna los siete reinos de Poniente.',
            'Type' => 'Series',
            'Genre' => 'Drama',
            'ReleaseDate' => '2017-05-02',
            'Platform' => 'NETFLIX',
            'URL' => 'https://www.netflix.com/title/80192098'
        ]);

        Contenido::create([
            'name' => 'American Horror Story',
            'slug' => 'american-horror-story',
            'Img' => $imagenahs,
            'Sinopsis' => 'Se sitúa en un mundo ficticio con elementos fantásticos, como dragones y poderes, pero también otros muy reales como son las luchas de poder, los enfrentamientos políticos, las traiciones y la continua guerra por el trono que gobierna los siete reinos de Poniente.',
            'Type' => 'Series',
            'Genre' => 'Horror',
            'ReleaseDate' => '2011-04-17',
            'Platform' => 'Disney+',
            'URL' => 'https://www.disneyplus.com/browse/entity-1c81b173-8647-4520-b8f2-4b62d6cd26ea'
        ]);

        Contenido::create([
            'name' => 'IT',
            'slug' => 'it',
            'Img' => $imagenit,
            'Sinopsis' => 'Varios niños de una pequeña ciudad del estado de Maine se alían para combatir a una entidad diabólica que adopta la forma de un payaso y desde hace mucho tiempo emerge cada 27 años para saciarse de sangre infantil.',
            'Type' => 'Movie',
            'Genre' => 'Horror',
            'ReleaseDate' => '2017-09-08',
            'Platform' => 'NETFLIX',
            'URL' => 'https://www.netflix.com/title/80177770'
        ]);

        Contenido::create([
            'name' => 'Dune',
            'slug' => 'dune',
            'Img' => $imagendune,
            'Sinopsis' => 'Arrakis, también denominado "Dune", se ha convertido en el planeta más importante del universo. A su alrededor comienza una gigantesca lucha por el poder que culmina en una guerra interestelar.',
            'Type' => 'Movie',
            'Genre' => 'Drama',
            'ReleaseDate' => '2021-02-22',
            'Platform' => 'HBO',
            'URL' => 'https://play.max.com/movie/e7dc7b3a-a494-4ef1-8107-f4308aa6bbf7'
        ]);

        Contenido::create([
            'name' => 'House of the Dragon',
            'slug' => 'house-of-the-dragon',
            'Img' => $imagenhdragon,
            'Sinopsis' => 'La historia de la familia Targaryen 200 años antes de los eventos que tuvieron lugar en "Juego de tronos".',
            'Type' => 'Series',
            'Genre' => 'Drama',
            'ReleaseDate' => '2022-08-22',
            'Platform' => 'HBO',
            'URL' => 'https://play.max.com/show/c68e69d7-9317-428a-a615-cdf8fe5a2e06'
        ]);

        Contenido::create([
            'name' => 'The Greatest Showman',
            'slug' => 'the-greatest-showman',
            'Img' => $imagenshowman,
            'Sinopsis' => 'En el siglo XIX, P.T. Barnum es un visionario que surge de la nada y crea un fascinante espectáculo que se convertirá en una sensación mundial, el llamado Ringling Bros. and Barnum & Bailey Circus.',
            'Type' => 'Movie',
            'Genre' => 'Musical',
            'ReleaseDate' => '2017-12-29',
            'Platform' => 'Disney+',
            'URL' => 'https://www.disneyplus.com/browse/entity-9a387ba2-9211-4493-a994-d4b73b8eaf3c'
        ]);

        Contenido::create([
            'name' => 'Pitch Perfect',
            'slug' => 'pitch-perfect',
            'Img' => $imagenpperfect,
            'Sinopsis' => 'Cuando una nueva estudiante se une al grupo femenino de música a capella de su universidad, saca a las mujeres de su zona de comfort para que cambien de las canciones tradicionales a un estilo más innovador.',
            'Type' => 'Movie',
            'Genre' => 'Musical',
            'ReleaseDate' => '2013-03-08',
            'Platform' => 'PrimeVideo',
            'URL' => 'https://www.primevideo.com/-/es/detail/Pitch-Perfect/0U43X2S253SWZI5XHHKYSQ1YJO'
        ]);

        Contenido::create([
            'name' => 'Talk to Me',
            'slug' => 'talk-to-me',
            'Img' => $imagentalktome,
            'Sinopsis' => 'Cuando un grupo de amigos descubre cómo conjurar espíritus con una mano embalsamada, quedan enganchados al nuevo y emocionante juego de alto riesgo, hasta que uno de ellos va demasiado lejos y desata aterradoras fuerzas sobrenaturales.',
            'Type' => 'Movie',
            'Genre' => 'Horror',
            'ReleaseDate' => '2023-06-27',
            'Platform' => 'PrimeVideo',
            'URL' => 'https://www.primevideo.com/detail/0QUOEZQ86MG4OQC9QWDKGHJKK1/ref=atv_sr_fle_c_Tn74RA_1_1_1?sr=1-1&pageTypeIdSource=ASIN&pageTypeId=B0C9VS83BX&qid=1716317927391'
        ]);

        Contenido::create([
            'name' => 'Zombieland',
            'slug' => 'zombieland',
            'Img' => $imagenzombie,
            'Sinopsis' => 'En un mundo plagado de zombis, Columbus es un joven que vive aterrorizado. Sin embargo, precisamente el miedo y la cobardía le han permitido sobrevivir. Un día conoce a Tallahassse, un gamberro cazazombies cuyo único deseo en la vida es lograr el último Twinkie de la Tierra.',
            'Type' => 'Movie',
            'Genre' => 'Comedy',
            'ReleaseDate' => '2009-11-27',
            'Platform' => 'AppleTV',
            'URL' => 'https://tv.apple.com/us/movie/zombieland/umc.cmc.6wwa6bx0gi4b53riq7a3wipeb'

        ]);

        Contenido::create([
            'name' => 'Avengers Endgame',
            'slug' => 'avengers-endgame',
            'Img' => $imagenendgame,
            'Sinopsis' => 'El universo está en ruinas debido a las acciones de Thanos, el Titán Loco. Con la ayuda de los aliados que quedaron, los Vengadores deberán reunirse una vez más para intentar detenerlo y restaurar el orden en el universo de una vez por todas.',
            'Type' => 'Movie',
            'Genre' => 'Action',
            'ReleaseDate' => '2019-04-26',
            'Platform' => 'Disney+',
            'URL' => 'https://www.disneyplus.com/browse/entity-b39aa962-be56-4b09-a536-98617031717f'
        ]);

        Contenido::create([
            'name' => 'Bad Mums',
            'slug' => 'bad-mums',
            'Img' => $imagenbadmums,
            'Sinopsis' => 'Amy cuida de todos menos de sí misma siendo su vida perfecta: un matrimonio feliz, hijos de sobresaliente, una casa preciosa y un pelo perfecto los 365 días del año. Colabora en todas las actividades de la escuela y asiste a cada reunión, todo mientras mantiene su carrera profesional.',
            'Type' => 'Movie',
            'Genre' => 'Comedy',
            'ReleaseDate' => '2016-07-29',
            'Platform' => 'PrimeVideo',
            'URL' => 'https://www.primevideo.com/-/es/detail/Bad-Moms/0R9TQXFLCI0CSMKGUL9BDWWBDU'
        ]);

        Contenido::create([
            'name' => 'Curon',
            'slug' => 'curon',
            'Img' => $imagencuron,
            'Sinopsis' => 'Una mujer regresa con sus hijos a su país natal en Tirol del Sur, al norte de Italia, para redescubrir su pasado, pero desaparece. Dos hermanos tratan de averiguar qué le pasó a su madre.',
            'Type' => 'Series',
            'Genre' => 'Drama',
            'ReleaseDate' => '2020-06-10',
            'Platform' => 'NETFLIX',
            'URL' => 'https://www.netflix.com/title/81037850'
        ]);

        Contenido::create([
            'name' => 'Mamma Mia!',
            'slug' => 'mamma-mia',
            'Img' => $imagenmammamia,
            'Sinopsis' => 'Versión cinematográfica del popular musical de ABBA. Una joven (Amanda Seyfried) que ha crecido en una pequeña isla griega, ha sido educada por una madre rebelde y poco convencional (Streep), que siempre se ha negado a revelarle la identidad de su padre.',
            'Type' => 'Movie',
            'Genre' => 'Musical',
            'ReleaseDate' => '2009-08-13',
            'Platform' => 'PrimeVideo',
            'URL' => 'https://www.primevideo.com/region/eu/detail/0T610DH9YXP9YD7PIK2YLCLFEC/ref=atv_sr_fle_c_Tn74RA_1_1_1?sr=1-1&pageTypeIdSource=ASIN&pageTypeId=B01N592H4M&qid=1716318182855'
        ]);

        Contenido::create([
            'name' => 'The Fast and the Furious: Tokyo Drift',
            'slug' => 'tokyo-drive',
            'Img' => $imagentokyodrive,
            'Sinopsis' => 'Shaun Boswell es un chico rebelde cuya única conexión con el mundo es a través de las carreras ilegales. Cuando la policía le amenaza con encarcelarle, se va a pasar una temporada con su tío, un militar destinado en Japón.',
            'Type' => 'Movie',
            'Genre' => 'Action',
            'ReleaseDate' => '2006-07-21',
            'Platform' => 'NETFLIX',
            'URL' => 'https://www.netflix.com/title/70044885'
        ]);

        Contenido::create([
            'name' => 'Maze Runner',
            'slug' => 'maze-runner',
            'Img' => $imagenmazerunner,
            'Sinopsis' => 'Thomas es un adolescente cuya memoria fue borrada y que ha sido encerrado junto a otros chicos de su edad en un laberinto plagado de monstruos y misterios. Para sobrevivir, tendrá que adaptarse a las normas y a los demás habitantes del laberinto.',
            'Type' => 'Movie',
            'Genre' => 'Action',
            'ReleaseDate' => '2014-09-19',
            'Platform' => 'NETFLIX',
            'URL' => 'https://www.netflix.com/title/70291089'
        ]);

        Contenido::create([
            'name' => 'Paquita Salas',
            'slug' => 'paquita-salas',
            'Img' => $imagenpaquita,
            'Sinopsis' => 'Paquita Salas es la jefa y responsable de su propia agencia de representación de actores, llamada PS Management. Es una mujer maleducada y chapada a la antigua que rechaza las nuevas tecnologías. Vivió la gloria de los años 90, donde su agencia estaba llena de jóvenes promesas. Ahora, años después, intenta adaptarse a los nuevos tiempos con la ayuda de su asistente Maüi Moreno.',
            'Type' => 'Series',
            'Genre' => 'Comedy',
            'ReleaseDate' => '2016-07-06',
            'Platform' => 'NETFLIX',
            'URL' => 'https://www.netflix.com/title/80195828'
        ]);
    }
}
