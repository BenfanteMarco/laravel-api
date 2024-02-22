<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 25; $i++) {
            $newpost = new Post();
            $newpost->name = $faker->sentence(3);
            $newpost->description = $faker->paragraph(2);
            $newpost->repository_link = $faker->url;
            $newpost->slug = Str::slug($newpost->name, '-');
            $newpost->save();
        }
    }
}
