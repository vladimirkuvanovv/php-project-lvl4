<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
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
        $user = User::factory()->create();

        return [
            'name'           => $this->faker->word,
            'status_id'      => $this->faker->numberBetween(1, 4),
            'created_by_id'  => $user->id,
            'assigned_to_id' => $user->id,
            'description'    => $this->faker->sentence(5),
        ];
    }
}
