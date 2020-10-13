<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\User;
use Illuminate\Database\Seeder;

class BoardUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Board::all() as $board) {
            $board->users()->sync(array_rand(User::all()->toArray(), random_int(1,4)));
        }
    }
}
