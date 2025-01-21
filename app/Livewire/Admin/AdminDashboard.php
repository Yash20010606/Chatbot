<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Skill;
use App\Models\Group;
use App\Models\User;

class AdminDashboard extends Component
{
    public $skills;
    public $groups;
    public $agentCount;

    public function mount()
    {
        // Fetch skills and groups data
        $this->skills = Skill::all();
        $this->groups = Group::all();

        // Fetch the agent count
        $this->agentCount = User::where('role', 'agent')
            ->join('agent', 'users.emp_id', '=', 'agent.emp_id')
            ->count();

        // Handle the redirection if no groups are available
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
