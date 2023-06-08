<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Lesson;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->numberBetween(-8, 8),
            'title' => $this->faker->sentence(4),
            'htmlTitle' => $this->faker->text,
            'subtitle' => $this->faker->word,
            'header' => $this->faker->word,
            'summary' => $this->faker->text,
            'body' => $this->faker->text,
            'vimeo_video' => $this->faker->word,
            'vimeo_duration' => $this->faker->word,
            'links' => $this->faker->text,
            'bold' => $this->faker->numberBetween(-8, 8),
            'author_id' => $this->faker->numberBetween(-10000, 10000),
            'creator_id' => $this->faker->numberBetween(-10000, 10000),
            'published_at' => $this->faker->word,
            'created_at' => $this->faker->regexify('[A-Za-z0-9]{500}'),
            'updated_at' => $this->faker->regexify('[A-Za-z0-9]{500}'),
        ];
    }
}
