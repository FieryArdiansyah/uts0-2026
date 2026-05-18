<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'Laravel',  'category' => 'Backend',  'level' => 90, 'sort_order' => 1],
            ['name' => 'PHP',      'category' => 'Backend',  'level' => 88, 'sort_order' => 2],
            ['name' => 'Livewire', 'category' => 'Frontend', 'level' => 75, 'sort_order' => 3],
            ['name' => 'Tailwind', 'category' => 'Frontend', 'level' => 82, 'sort_order' => 4],
            ['name' => 'MySQL',    'category' => 'Database', 'level' => 80, 'sort_order' => 5],
            ['name' => 'Docker',   'category' => 'DevOps',   'level' => 70, 'sort_order' => 6],
            ['name' => 'Git',      'category' => 'DevOps',   'level' => 85, 'sort_order' => 7],
            ['name' => 'Filament', 'category' => 'Backend',  'level' => 78, 'sort_order' => 8],
        ];

        foreach ($skills as $skill) {
            Skill::firstOrCreate(['name' => $skill['name']], $skill);
        }
    }
}