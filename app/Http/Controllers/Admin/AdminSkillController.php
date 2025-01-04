<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class AdminSkillController extends Controller
{
    // Store a new skill
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Skill::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.skill')->with('success', 'Skill added successfully!');
    }

    // Update an existing skill
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $skill = Skill::findOrFail($id);
        $skill->update([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.skill')->with('success', 'Skill updated successfully!');
    }

    
    // Remove the specified skill from storage
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('admin.skill')->with('success', 'Skill deleted successfully!');
    }
}
