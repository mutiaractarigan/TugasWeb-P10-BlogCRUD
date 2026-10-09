<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 15 post dummy supaya pagination terlihat (5 post per halaman)
        Post::factory(15)->create();
    }
}
