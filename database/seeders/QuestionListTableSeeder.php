<?php

namespace Database\Seeders;
use App\Models\QuestionList;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QuestionList::factory()->count(10)->create();
    }
}
