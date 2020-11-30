<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Task::factory()->count(2)->make();
    }

    public function testIndex()
    {
        $response = $this->get(route('tasks.index'));

        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->get('tasks.create');

        $response->assertOk();
    }

    public function testEdit()
    {
        $task = Task::factory()->create();
        $response = $this->get(route('tasks.edit', [$task]));

        $response->assertOk();
    }

    public function testStore()
    {
        $task = Task::factory()->make()->toArray();
        $data = Arr::only($task, [
            'name',
            'status_id',
            'created_by_id',
            'assigned_to_id',
            'description'
        ]);

        $response = $this->post(route('tasks.store'), $data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testUpdate()
    {
        $task = Task::factory()->create();
        $data = Task::factory()->make()->toArray();

        $response = $this->patch(route('tasks.update', $task), $data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('tasks', $data);
    }

    public function testDelete()
    {
        $task = Task::factory()->create();
        $response = $this->delete(route('tasks.destroy', [$task]));

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
