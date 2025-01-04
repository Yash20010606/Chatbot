<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Skill;


class AdminSkillManager extends Component
{
    public $skills;
    public $name;
    public $category;
    public $description;
    public $skillId;

    protected $rules = [
        'name' => 'required|string|max:255',
        'category' => 'required|string',
        'description' => 'required|string',
    ];

    public function mount()
    {
        $this->loadSkills();
    }

    public function loadSkills()
    {
        $this->skills = Skill::all();
    }

    public function render()
    {
        return view('livewire.admin.admin-skill-manager')->layout('layouts.app');

    }

    
    
}
