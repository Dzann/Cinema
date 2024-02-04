<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Purchase;
use App\Models\PurchaseTicket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // User::create([
        //     'username' => 'kasir3',
        //     'password' => 'password',

        // ]);


        $user = User::Create([
            'username' => 'kasir1',
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);
        $user = User::Create([
            'username' => 'admin',
            'password' => bcrypt('1'),
            'role' => 'admin'
        ]);
        $user = User::Create([
            'username' => 'owner',
            'password' => bcrypt('1'),
            'role' => 'owner'
        ]);

        
        Genre::create([
            'name' => 'Horor'
        ]);
        Genre::create([
            'name' => 'Adventure'
        ]);
        Genre::create([
            'name' => 'Action'
        ]);
        Genre::create([
            'name' => 'Music'
        ]);


        Movie::create([
            'name' => 'KKN Di Desa Penari',
            'genre_id' => 1,
            'image' => 'https://risetcdn.jatimtimes.com/images/2020/01/22/KKN-di-Desa-Penari-Akan-Tayang-di-Bioskop-Tonton-Teasernya-di-Sini6a02a6dbb0f0dc82.jpg',
            'minutes' => '130',
            'director' => 'asdds',
            'studio_name' => 'Anggrek',
            'studio_capacity' => '96',
            'deskripsi' => 'berikut merupakan sinopsis dari film tersebut'
        ]);
        Movie::create([
            'name' => 'Jujutsu Kaisen 0',
            'genre_id' => 3,
            'image' => 'img/JJK 0.jpg',
            'minutes' => '105',
            'director' => 'Gege Akutami',
            'studio_name' => 'MAPPA',
            'studio_capacity' => '96',
            'deskripsi' => 'berikut merupakan sinopsis dari film tersebut'
        ]);

        Purchase::create([
            'movie_id' => 1,
            'date' => '2022-05-24',
            'time' => '13.00',
            'total' => 104000,
            'cash' => 105000
        ]);
        PurchaseTicket::create([
            'purchase_id' => 1,
            'seat' => 'E05',
        ]);
    }
}
