<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        do {
            $from = rand(1, 10);
            $to = rand(1, 10);
        } while ($from == $to);

        return [
            'from' => $from,
            'to' => $to,
            'text' => $this->faker->sentence(10),
        ];
    }
}
