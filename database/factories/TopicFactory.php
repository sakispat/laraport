<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Topic;

class TopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topic::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'priority' => $this->faker->numberBetween(-100000, 100000),
            'status' => $this->faker->numberBetween(-8, 8),
            'comment_status' => $this->faker->numberBetween(-100000, 100000),
            'title' => $this->faker->sentence(4),
            'short_title' => $this->faker->word,
            'subtitle' => $this->faker->word,
            'header' => $this->faker->word,
            'summary' => $this->faker->text,
            'body' => $this->faker->text,
            'author_id' => $this->faker->numberBetween(-10000, 10000),
            'creator_id' => $this->faker->numberBetween(-10000, 10000),
            'email_template' => $this->faker->word,
            'created_at' => $this->faker->regexify('[A-Za-z0-9]{500}'),
            'updated_at' => $this->faker->regexify('[A-Za-z0-9]{500}'),
        ];
    }
}
