<?php

namespace Database\Seeders;

use App\Models\Podcast;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
        ->count(5)
        ->has(
            Podcast::factory()
                ->count(5)
                ->hasEpisodes(5)
        )
        ->create();

        Category::factory()
        ->count(5)
        ->has(
            Podcast::factory()
                ->count(3)
                ->hasEpisodes(3)
        )
        ->create();

        Category::factory()
        ->count(3)
        ->has(
            Podcast::factory()
                ->count(5)
        )
        ->create();

        Category::factory()
        ->count(2)
        ->create();
    }
}
