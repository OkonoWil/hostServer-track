<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Server>
 */
class ServerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Server::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'ip_address' => $this->faker->unique()->regexify("/^(?:(?:1\d{2}|2[0-4]\d|25[0-5]|[1-9]\d?|[1-9])\.){3}(?:1\d{2}|2[0-4]\d|25[0-5]|[1-9]\d?|[1-9])$/"),
            'datacenter_name' => $this->faker->name(),
            'availablity' => $this->faker->randomElement([true, false]),
        ];
    }
}
