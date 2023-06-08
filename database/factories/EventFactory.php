<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Event;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'priority' => $this->faker->numberBetween(-100000, 100000),
            'status' => $this->faker->numberBetween(-8, 8),
            'published' => $this->faker->numberBetween(-8, 8),
            'release_date_files' => $this->faker->dateTime(),
            'expiration' => $this->faker->word,
            'title' => $this->faker->sentence(4),
            'htmlTitle' => $this->faker->text,
            'subtitle' => $this->faker->word,
            'header' => $this->faker->word,
            'summary' => $this->faker->text,
            'body' => $this->faker->text,
            'hours' => $this->faker->word,
            'absences_limit' => $this->faker->numberBetween(-10000, 10000),
            'enroll' => $this->faker->numberBetween(-8, 8),
            'index' => $this->faker->numberBetween(-8, 8),
            'feed' => $this->faker->numberBetween(-8, 8),
            'certificate_title' => $this->faker->text,
            'fb_group' => $this->faker->text,
            'evaluate_topics' => $this->faker->text,
            'evaluate_instructors' => $this->faker->text,
            'fb_testimonial' => $this->faker->text,
            'author_id' => $this->faker->numberBetween(-10000, 10000),
            'creator_id' => $this->faker->numberBetween(-10000, 10000),
            'view_tpl' => $this->faker->word,
            'view_counter' => $this->faker->numberBetween(-10000, 10000),
            'published_at' => $this->faker->word,
            'created_at' => $this->faker->regexify('[A-Za-z0-9]{500}'),
            'updated_at' => $this->faker->regexify('[A-Za-z0-9]{500}'),
            'launch_date' => $this->faker->word,
            'xml_title' => $this->faker->text,
            'xml_description' => $this->faker->text,
            'xml_short_description' => $this->faker->text,
        ];
    }
}
