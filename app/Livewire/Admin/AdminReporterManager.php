<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Reporter;
use App\Models\ReporterGroup;
use App\Models\Group;
use Livewire\Component;

class AdminReporterManager extends Component
{

    public function render()
    {
        $reporters = User::where('role', 'reporter')
            ->join('reporter_group', 'users.emp_id', '=', 'reporter_group.emp_id')
            ->select('users.name', 'users.emp_id', 'users.email', 'reporter_group.group_code as group')
            ->get();

            $groups = Group::all();

        return view('livewire.admin.admin-reporter-manager', compact('groups', 'reporters'));
    }

}
