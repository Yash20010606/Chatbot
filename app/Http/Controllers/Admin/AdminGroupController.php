<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class AdminGroupController extends Controller
{
    // Store a new group
    public function store(Request $request){
        $validated = $request->validate([
            'group_name' => 'required|string|max:255',
            'group_code' => 'required|string|max:4|unique:groups',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
        ]);
    
        Group::create($validated);
        return redirect()->route('admin.group')->with('success', 'Group added successfully!');
    }
    
    // Update an existing group
    public function update(Request $request, $id){
        $validated = $request->validate([
            'group_name' => 'required|string|max:255',
            'group_code' => 'required|string|max:4|unique:groups,group_code,' . $id,
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
        ]);
    
        $group = Group::findOrFail($id);
        $group->update($validated);
        return redirect()->route('admin.group')->with('success', 'Group updated successfully!');
    }      
}

