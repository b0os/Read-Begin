<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'full_name'     =>  fake()->name(),
            'email'         =>  fake()->unique()->safeEmail(),
            'user_image'    =>  UploadedFile::fake()->image('test.png'),
            'user_name'     => fake()->unique()->firstName(),
            'birthdate'     => '2000-01-01',
            'phone'         => fake()->phoneNumber(),
            'address'       => fake()->address(),
            'password'      => static::$password ??= Hash::make('password'),
        ];
    }

    public function withUsername(string $username): UserFactory
    {
        return $this->state(function (array $attributes) use ($username) {
            return [
                'user_name' => $username,
            ];
        });
    }

}
