<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [[
            'name'=> 'saico',
            'email'=> 'saico@app.com',
            'course'=> 'oop',
            'phone'=> '011571145'
        ],
        ['name'=> 'user',
        'email'=> 'user@app.com',
        'course'=> 'api',
        'phone'=> '011571645']];

        foreach ($students as $student) {
            Student::create([
    'name'=> $student['name'],
    'email'=> $student['email'],
    'course'=> $student['course'],
    'phone'=> $student['phone'],
]);
        }
    }
}
// Student::create([
//     'name'=> $student['name'],
//     'email'=> $student['email'],
//     'course'=> $student['course'],
//     'phone'=> $student['phone'],
// ]);
