<?php

use App\Group;
use App\Task;
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
        $group1 = Group::create(['name' => 'Phase 1']);
        $group2 = Group::create(['name' => 'Phase 2']);
        $group3 = Group::create(['name' => 'Phase 3']);

        Task::create(['name' => 'Make design', 'group_id' => $group1->id]);
        Task::create(['name' => 'Create documentation', 'group_id' => $group1->id]);
        Task::create(['name' => 'Set time limit', 'group_id' => $group1->id]);
        Task::create(['name' => 'Calculate the price', 'group_id' => $group1->id]);

        Task::create(['name' => 'Design database', 'group_id' => $group2->id]);
        Task::create(['name' => 'Front end index page', 'group_id' => $group2->id]);
        Task::create(['name' => 'Backend index page', 'group_id' => $group2->id]);

        Task::create(['name' => 'Front end contact page', 'group_id' => $group3->id]);
        Task::create(['name' => 'Back end contact page', 'group_id' => $group3->id]);
        Task::create(['name' => 'Test web site', 'group_id' => $group3->id]);


        // $this->call(UserSeeder::class);
    }
}
