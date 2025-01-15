<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Skill;
use App\Models\Group;

class AdminDashboard extends Component
{
    public $skills;
    public $groups;

    public function mount()
    {
        // Fetch skills and groups data
        $this->skills = Skill::all();
        $this->groups = Group::all();

        // If no groups, handle the redirection
        if ($this->groups->isEmpty()) {
            session()->flash('error', 'No groups available.');
            redirect()->route('admin.group');
        }
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard');
    }
}
