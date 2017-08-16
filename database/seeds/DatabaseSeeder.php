<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 30)->create();
        $this->command->info('Users table seeded!');

        factory(App\Test::class, 30)->create();
        $this->command->info('Tests table seeded!');

        factory(App\Question::class, 30)->create();
        $this->command->info('Questions table seeded!');

        factory(App\Answer::class, 30)->create();
        $this->command->info('Answers table seeded!');
    }
}
