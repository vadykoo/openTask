<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        \App\Models\Board::factory(15)->create();
        $this->call(LabelSeeder::class);
        \App\Models\Task::factory(20)->create();
//        $this->call(ImageSeeder::class);
        $this->call(LableTaskSeeder::class);
        $this->call(BoardUserSeeder::class);

    }
}
