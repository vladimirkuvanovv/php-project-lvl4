<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['новый', 'в работе', 'на тестировании', 'завершен'] as $status) {
            DB::table('task_statuses')->insert([
                'name' => $status,
            ]);
        }

//        TaskStatus::factory(10)->create();
    }
}
