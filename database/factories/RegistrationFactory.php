<?php

namespace Database\Factories;

use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<Event>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration_date' => $this->faker->date(),
            'notes' => $this->faker->text(),
            'event_id' => Event::inRandomOrder()->first()->id,
            'attendee_id' => Attendee::inRandomOrder()->first()->id,
            'registered_by' => $this->faker->name()

        ];
    }
}
