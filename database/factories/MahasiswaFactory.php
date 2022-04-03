<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nim' => $this->faker->numerify("#########"),
            'nama' => $this->faker->name(),
            'kelas' => $this->faker->text(5),
            'jurusan' => $this->faker->text(10),
            'e-mail' => $this->faker->text(50),
            'alamat' => $this->faker->text(30),
            'tgl_lahir' => $this->faker->date()
        ];
    }
}
