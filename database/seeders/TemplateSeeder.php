<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TemplateList;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TemplateList::create([
            'form_id' =>'1',
            'form_name' => 'Template 1',
        ]);
        TemplateList::create([
            'form_id' =>'2',
            'form_name' => 'Template 2',
        ]);
        TemplateList::create([
            'form_id' =>'3',
            'form_name' => 'Template 3',
        ]);
        TemplateList::create([
            'form_id' =>'4',
            'form_name' => 'Template 4',
        ]);
        TemplateList::create([
            'form_id' =>'5',
            'form_name' => 'Template 5',
        ]);
        TemplateList::create([
            'form_id' =>'6',
            'form_name' => 'Template 6',
        ]);
    }
}
