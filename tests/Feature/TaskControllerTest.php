<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Arr;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function testIndex()
    {
        $response = $this->get(route('tasks.index'));

        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->get(route('tasks.create'));

        $response->assertOk();
    }

    public function testEdit()
    {
        $task = Task::factory()->create(['created_by_id' => $this->user->id]);
        $response = $this->get(route('tasks.edit', [$task]));

        $response->assertOk();
    }

    public function testStore()
    {
        $task = Task::factory()
            ->make(['created_by_id' => $this->user->id])
            ->toArray();
        $data = Arr::only(
            $task,
            [
                'name',
                'status_id',
                'assigned_to_id',
                'description'
            ]
        );

        $response = $this->post(route('tasks.store'), $data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testUpdate()
    {
        $task = Task::factory()->create(['created_by_id' => $this->user->id]);
        $data = Task::factory()->make()->toArray();

        $response = $this->patch(route('tasks.update', $task->id), $data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testDelete()
    {
        $task = Task::factory()->create(['created_by_id' => $this->user->id]);
        $response = $this->delete(route('tasks.destroy', $task->id));

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
