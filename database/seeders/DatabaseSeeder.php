<?php

namespace Database\Seeders;

use App\Models\student_contact;
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
        student_contact::create([
            'Name' => 'Ali',
            'Level' => 2,
            'Class' => 'Berlian',
            'Parent_contact' => '0112111111',
        ]);
    }
}
