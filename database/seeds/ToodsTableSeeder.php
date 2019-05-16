<?php

use Illuminate\Database\Seeder;
use App\Todo;
use App\User;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Todo::class, 20)->create()->each(function ($todo) {
            $user = User::all()->random();
            $todo->user_id = $user->id;
            $todo->save();
        });
    }
}
