<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\TaskComment;
use App\Models\User;
use Illuminate\Support\Arr;
use Tests\TestCase;

class TaskCommentControllerTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function testStore()
    {
        $taskComment = TaskComment::factory()->make()->toArray();
        $task = Task::factory()->create(['created_by_id' => $this->user->id]);
        $data = Arr::only($taskComment, ['comment']);

        $response = $this->post(route('task.comments.store', $task), $data);
//        $data['user_id'] = $user->id;

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('task_comments', $data);
    }
}
