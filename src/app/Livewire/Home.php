<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Skill;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'skills'   => Skill::orderBy('sort_order')->get()->groupBy('category'),
            'projects' => Project::where('status', '!=', 'archived')
                            ->latest()
                            ->take(3)
                            ->get(),
        ])->layout('layouts.app');
    }
}