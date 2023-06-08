<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;

class EventUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventUser::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'event_id' => Event::factory(),
            'user_id' => User::factory(),
            'paid' => $this->faker->numberBetween(-8, 8),
            'expiration' => $this->faker->word,
            'payment_method' => $this->faker->numberBetween(-10000, 10000),
            'comment' => $this->faker->text,
        ];
    }
}
