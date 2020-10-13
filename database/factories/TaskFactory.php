<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Make ' . $this->faker->jobTitle,
            'content' => $this->faker->sentence,
//            'status' => array_rand(\Config::get('constants.status')),
            'board_id' => Board::all()->random()->id,
            'created_by' => User::all()->random()->id,
        ];
    }
}
