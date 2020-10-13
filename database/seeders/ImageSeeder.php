<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Task;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (Task::all() as $task) {
            Image::create([
                'desktop_path' => $faker->image(public_path('storage/images'),640*2,480*2, null, false),
                'mobile_path' => $faker->image(public_path('storage/images'),640,480, null, false),
                'task_id' => $task->id
            ]);
        }
    }
}
