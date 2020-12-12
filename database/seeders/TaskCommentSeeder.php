<?php

namespace Database\Seeders;

use App\Models\TaskComment;
use Illuminate\Database\Seeder;

class TaskCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskComment::factory(5)->create();
    }
}
