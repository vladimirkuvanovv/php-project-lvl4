<?php

namespace Tests\Feature;

use App\Models\TaskStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class TaskStatusesControllerTest extends TestCase
{
    protected $status;

    protected function setUp(): void
    {
        parent::setUp();

        TaskStatus::factory()->count(2)->make();
    }

    public function testIndex()
    {
        $response = $this->get(route('task_statuses.index'));

        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->get('task_statuses.create');

        $response->assertOk();
    }

    public function testEdit()
    {
        $task_status = TaskStatus::factory()->create();
        $response = $this->get(route('task_statuses.edit', [$task_status]));

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $task_status = TaskStatus::factory()->make()->toArray();
        $data = Arr::only($task_status, ['name']);

        $response = $this->post(route('task_statuses.store'), $data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testUpdate()
    {
        $task_status = TaskStatus::factory()->create();
        $data = TaskStatus::factory()->make()->toArray();

        $response = $this->patch(route('task_statuses.update', $task_status), $data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testDelete()
    {
        $task_status = TaskStatus::factory()->create();
        $response = $this->delete(route('task_statuses.destroy', [$task_status]));

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('task_statuses', ['id' => $task_status->id]);
    }
}
