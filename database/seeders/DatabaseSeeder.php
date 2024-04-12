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
        
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234'),
        ]);

        Contenido::create([
            'name' => 'Cars',
            'Img' => $imagencars,
            'Type' => 'Movie',
            'Genre' => 'Action',
            'ReleaseDate' => '2005-01-20',
            'Platform' => 'Disney+',
            'Rating' => '8.2'
        ]);

        Contenido::create([
            'name' => 'Gray´s Anatomy',
            'Img' => $imagengray,
            'Type' => 'Series',
            'Genre' => 'Drama',
            'ReleaseDate' => '2005-06-28',
            'Platform' => 'Disney+',
            'Rating' => '7.6'
        ]);

        Contenido::create([
            'name' => 'Game of Thrones',
            'Img' => $imagenGOT,
            'Type' => 'Series',
            'Genre' => 'Drama',
            'ReleaseDate' => '2011-04-17',
            'Platform' => 'HBO',
            'Rating' => '9.6'
        ]);
        
        Contenido::create([
            'name' => 'The Conjuring',
            'Img' => $imagenConj,
            'Type' => 'Movie',
            'Genre' => 'Horror',
            'ReleaseDate' => '2013-10-18',
            'Platform' => 'PrimeVideo',
            'Rating' => '7.8'
        ]);
    }
}
