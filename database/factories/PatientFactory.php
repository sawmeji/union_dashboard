<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $townships = ['AMP', 'AMT', 'CAT', 'CMT', 'PTG', 'PGT', 'MHA'];
        $sexes = ['Male', 'Female'];
        $votOptions = [true, false];

        return [
            'township' => $this->faker->randomElement($townships),
            'serial_number' => $this->faker->unique()->numberBetween(1000, 9999),
            'registration_date' => $this->faker->date,
            'name' => $this->faker->name,
            'sex' => $this->faker->randomElement($sexes),
            'age' => $this->faker->numberBetween(1, 119),
            'address' => $this->faker->text(40),
            'treatment_start_date' => $this->faker->date,
            'vot' => $this->faker->randomElement($votOptions),
            'username' => function (array $attributes) {
                return $attributes['township'] . '_' . $attributes['serial_number'] . '_' . date('Y');
            },
            'password' => $this->faker->numerify('####'),
        ];
    }
}
