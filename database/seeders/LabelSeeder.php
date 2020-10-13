<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\User;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = Label::create(
            [
                'name' => 'Small task',
            ],
            [
                'name' => 'Medium Priority',
            ],
            [
                'name' => 'High Priority',
            ],
            [
                'name' => 'Meeting',
            ],
            [
                'name' => 'Bug',
                'created_by' => 1
            ]
        );
    }
}
