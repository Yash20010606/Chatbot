<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Reporter;
use App\Models\Group;
use App\Models\ReporterGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminReporterController extends Controller
{
    public function index()
{
    $reporters = User::where('role', 'reporter')
        ->join('reporter_group', 'users.emp_id', '=', 'reporter_group.emp_id')
        ->select('users.name', 'users.emp_id', 'users.email', 'reporter_group.group_code as group')
        ->get();

    $groups = Group::all();

    return view('livewire.admin.admin-reporter-manager', compact('groups', 'reporters'));
}

// Store Method to add a new reporter
public function store(Request $request)
{
    $validated = $request->validate([
        'emp_id' => 'required|unique:users,emp_id',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'group_code' => 'required|array',
        'group_code.*' => 'exists:group,group_code',
        'password' => 'required|min:6|same:confirmPassword',
    ]);

    // Create user
    $user = User::create([
        'emp_id' => $validated['emp_id'],
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => 'reporter',
    ]);

    // Add user to selected groups
    foreach ($validated['group_code'] as $group_code) {
        ReporterGroup::create([
            'emp_id' => $user->emp_id,
            'group_code' => $group_code,
        ]);
    }

    return redirect()->route('admin.reporter')->with('success', 'Reporter added successfully.');
}

    public function edit($emp_id)
    {
        // Fetch the reporter details based on the emp_id
        $reporter = User::where('emp_id', $emp_id)->firstOrFail();
        $groups = ReporterGroup::where('emp_id', $emp_id)->pluck('group_code')->toArray();
        
    
        // Fetch the group from the reporter_group table
        $group = ReporterGroup::where('emp_id', $emp_id)->value('group_code');
    
        return response()->json([
            'reporter' => $reporter,
            'group' => $group,
        ]);
        
    }
    
    public function update(Request $request, $emp_id)
{
    // Validate input with dynamic emp_id rules
    $validated = $request->validate([
        'emp_id' => 'required|string|unique:users,emp_id,' . $emp_id . ',emp_id',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $emp_id . ',emp_id',
        'group_code' => 'required|array|min:1',
        'group_code.*' => 'exists:group,group_code',
        'password' => 'nullable|min:6|same:confirmPassword',
    ]);
    
    // Fetch the current user
    $user = User::where('emp_id', $emp_id)->firstOrFail();
    
    // If emp_id changes, update it in both tables
    if ($user->emp_id !== $validated['emp_id']) {
        // Allow emp_id to be updated
        ReporterGroup::where('emp_id', $emp_id)->update(['emp_id' => $validated['emp_id']]);
        $user->update(['emp_id' => $validated['emp_id']]);
    }

    // Update user details
    $user->update([
        'name' => $validated['name'],
        'email' => $validated['email'],
    ]);

    // Update or create reporter group assignment
    ReporterGroup::where('emp_id', $validated['emp_id'])->delete();
    
    foreach ($validated['group_code'] as $group_code) {
        ReporterGroup::updateOrCreate(
            ['emp_id' => $validated['emp_id'], 'group_code' => $group_code]
        );
    }

    // Update password if provided
    if (!empty($validated['password'])) {
        $user->update(['password' => Hash::make($validated['password'])]);
    }

    return redirect()->route('admin.reporter')->with('success', 'Reporter updated successfully.');
}

    
    public function destroy($emp_id)
{

    User::where('emp_id', $emp_id)->delete();
    ReporterGroup::where('emp_id', $emp_id)->delete();

    return redirect()->route('admin.reporter')->with('success', 'Reporter deleted successfully.');
}

public function filter(Request $request)
{
    // Update the query to target reporters
    $query = User::where('role', 'reporter')
        ->join('reporter_group', 'users.emp_id', '=', 'reporter_group.emp_id')
        ->select('users.name', 'users.emp_id', 'users.email', 'reporter_group.group_code as group');

    // Filter by Employee ID if provided
    if ($request->filled('empID')) {
        $query->where('users.emp_id', $request->empID);
    }

    // Filter by Group if provided
    if ($request->filled('group')) {
        $query->where('reporter_group.group_code', $request->group);
    }

    // Fetch the reporters based on the query
    $reporters = $query->get();

    // Return reporters as JSON response
    return response()->json($reporters);
}
   
}
