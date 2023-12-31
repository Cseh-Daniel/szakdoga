<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $counties = [
            'Bács-Kiskun',
            'Baranya',
            'Békés',
            'Borsod-Abaúj-Zemplén',
            'Csongrád-Csanád',
            'Fejér',
            'Győr-Moson-Sopron',
            'Hajdú-Bihar',
            'Heves',
            'Jász-Nagykun-Szolnok',
            'Komárom-Esztergom',
            'Nógrád',
            'Pest',
            'Somogy',
            'Szabolcs-Szatmár-Bereg',
            'Tolna',
            'Vas',
            'Veszprém',
            'Zala',
        ];

        $professions = [
            'Agrár',
            'Államtudományi',
            'Bölcsészettudomány',
            'Gazdaságtudományok',
            'Hitéleti',
            'Informatika',
            'Jogi',
            'Műszaki',
            'Művészet',
            'Művészetközvetítés',
            'Orvos- és egészségtudomány',
            'Pedagógusképzés',
            'Sporttudomány',
            'Társadalomtudomány',
            'Természettudomány',
        ];

        $roles = [
            'admin',
            'member',
            'guest',
        ];

        foreach ($counties as $county) {
            \App\Models\County::create(['name' => $county]);
        }

        foreach ($professions as $profession) {
            \App\Models\Profession::create(['name' => $profession]);
        }

        foreach ($roles as $role) {
            \App\Models\Role::create(['name' => $role]);
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@user.com',
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@user.com',
            'role_id' => 1,
        ]);

        User::factory()->count(10)->create();

        Post::factory()->count(15)->create();
        Comment::factory()->count(100)->create();

    }
}
