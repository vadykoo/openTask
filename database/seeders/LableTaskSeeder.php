<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class LableTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Task::all() as $task) {
            $task->labels()->sync(array_rand([0,1,2,3,4], random_int(1,4)));
        }
    }
}
