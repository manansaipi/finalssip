<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ticket_title' => fake()->name(),
            'creator_id' =>  mt_rand(262021001, 262021011),
            'body' => fake()->text(),
            // 'status_ticket' =>  2,
            'status_ticket' =>  mt_rand(0, 3),
            'solvedby_id' =>  mt_rand(262021001, 262021011),
            'feedback' => fake()->text()
        ];
    }
}
