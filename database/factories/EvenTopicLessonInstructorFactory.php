<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EvenTopicLessonInstructor;
use App\Models\Event;
use App\Models\Instructor;
use App\Models\Lesson;
use App\Models\Topic;

class EvenTopicLessonInstructorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EvenTopicLessonInstructor::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'event_id' => Event::factory(),
            'topic_id' => Topic::factory(),
            'lesson_id' => Lesson::factory(),
            'instructor_id' => Instructor::factory(),
            'date' => $this->faker->word,
            'time_starts' => $this->faker->word,
            'time_ends' => $this->faker->word,
            'duration' => $this->faker->word,
            'room' => $this->faker->word,
            'location_url' => $this->faker->word,
            'priority' => $this->faker->numberBetween(-10000, 10000),
            'automate_mail' => $this->faker->numberBetween(-8, 8),
            'send_automate_mail' => $this->faker->numberBetween(-8, 8),
        ];
    }
}
