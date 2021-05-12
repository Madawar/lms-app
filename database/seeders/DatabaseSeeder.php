<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\RoleRequirement;
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

        $courses = array(
            'Aircraft Turnaround Coordination and Loading Supervision',
            'Aircraft Weight And Balance',
            'Baggage Claims and Proration',
            'Dangerous Goods Regulation',
            'IGOM Implementation and STanderdized Procedures'
        );
        foreach ($courses as $course) {
            \App\Models\Course::factory(1)->create(array(
                'name' => $course,
            ));
        }
        $roles = array(
            'BA Duty Officer',
            'EK Duty Officer',
            'BA Cargo Loading Agent',
            'EK Cargo Loading Agent',
            'AI Duty Officer',
            'AI Cargo Loading Agent',
        );
        foreach ($roles as $role) {
            \App\Models\Role::factory(1)->create(array(
                'name' => $role,
            ))->each(function ($role) {
                for ($x = 0; $x <= rand(1,4); $x++) {
                    RoleRequirement::updateOrCreate(array(
                        'role_id'=>$role->id,
                        'course_id'=>Course::inRandomOrder()->first()->id
                    ));
                  }

            });
        }
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory(1)->create(array(
            'name' => 'Dennis Wanyoike',
            'email' => 'dwanyoike@codedcell.com',
        ));
    }
}
