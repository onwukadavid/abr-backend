<?php

namespace Database\Factories;

use App\Models\Podcast;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Episode>
 */
class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'podcast_id'=>Podcast::factory(),
            'title'=>$this->faker->paragraph(),
            'audio_url'=>$this->faker->url(),
            'duration'=>$this->faker->numberBetween(60, 3600)
        ];
    }
}
