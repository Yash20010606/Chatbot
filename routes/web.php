<?php
use App\Http\Controllers\Admin\AdminSupervisorController;
use App\Http\Controllers\Admin\AdminSkillController;
use App\Http\Controllers\Admin\AdminAgentController;
use App\Http\Controllers\Admin\AdminGroupController;
use App\Http\Controllers\Supervisor\SupervisorAgentController;
use App\Http\Controllers\AuthController;
use App\Livewire\Admin\AdminAgentManager;
use App\Livewire\Admin\AdminChatHistory;
use App\Livewire\Admin\AdminDashboardExtended;
use App\Livewire\Admin\AdminGroupManager;
use App\Livewire\Admin\AdminReporterManager;
use App\Livewire\Admin\AdminSkillManager;
use App\Livewire\Admin\AdminSupervisorManager;
use App\Livewire\Admin\AdminProfile;
use App\Livewire\Login;
use App\Livewire\Reporter\ReporterChatHistory;
use App\Livewire\Reporter\ReporterDashboard;
use App\Livewire\Reporter\ReporterProfile;
use App\Livewire\Reporter\ReporterUsers;
use App\Livewire\Supervisor\SupervisorAgentManager;
use App\Livewire\Supervisor\SupervisorChatHistory;
use App\Livewire\Supervisor\SupervisorProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin
Route::get('/dashboard', [AdminDashboardExtended::class, 'render'])->name('admin.dashboard');
Route::get('/chat-history', [AdminChatHistory::class, 'render'])->name('admin.chat-history');
Route::get('/agent', [AdminAgentManager::class, 'render'])->name('admin.agent');
Route::get('/supervisors', [AdminSupervisorManager::class, 'render'])->name('admin.supervisor');
Route::get('/reporters', [AdminReporterManager::class, 'render'])->name('admin.reporter');
Route::get('/groups', AdminGroupManager::class)->name('admin.group');
Route::get('/skill-manager', AdminSkillManager::class)->name('admin.skill');
Route::get('/profile', [AdminProfile::class, 'render'])->name('admin.profile');
Route::post('skills', [AdminSkillController::class, 'store'])->name('skills.store');
Route::delete('skills/{id}', [AdminSkillController::class, 'destroy'])->name('skills.destroy');
Route::put('skills/{skill}', [AdminSkillController::class, 'update'])->name('skills.update');
Route::post('admin/agents/store', [AdminAgentController::class, 'store'])->name('admin.agents.store');
Route::get('/agents', [AdminAgentController::class, 'index'])->name('agents.index');
Route::get('/agents/edit/{emp_id}', [AdminAgentController::class, 'edit'])->name('agents.edit');
Route::post('/agents/update/{emp_id}', [AdminAgentController::class, 'update'])->name('agents.update');
Route::post('/agents/delete/{emp_id}', [AdminAgentController::class, 'destroy'])->name('agents.destroy');
Route::get('/agents/filter', [AdminAgentController::class, 'filter'])->name('agents.filter');
Route::post('/groups', [AdminGroupController::class, 'store'])->name('group.store');
Route::put('/groups/{group}', [AdminGroupController::class, 'update'])->name('group.update');
Route::delete('groups/{id}', [AdminGroupController::class, 'destroy'])->name('group.destroy');
Route::get('/admin/supervisor', [AdminSupervisorController::class, 'index'])->name('admin.supervisor');
Route::post('/admin/supervisor/add', [AdminSupervisorController::class, 'addSupervisor'])->name('admin.supervisor.add');
Route::get('/admin/supervisors/{id}/edit', [AdminSupervisorController::class, 'edit'])->name('admin.supervisor.edit');
Route::put('/admin/supervisors/{id}', [AdminSupervisorController::class, 'update'])->name('admin.supervisor.update');
Route::delete('/admin/supervisor/{id}', [AdminSupervisorController::class, 'delete'])->name('admin.supervisor.delete');
Route::get('/supervisor/search', [AdminSupervisorController::class, 'search'])->name('admin.supervisor.search');



//supervisor
Route::get('/supervisor-dashboard', [SupervisorChatHistory::class, 'render'])->name('supervisor.dashboard');
Route::get('/supervisor-chat-history', [SupervisorChatHistory::class, 'render'])->name('supervisor.chat.history');
Route::get('/supervisor-agent', [SupervisorAgentManager::class, 'render'])->name('supervisor.agent');
Route::get('/supervisor-profile', [SupervisorProfile::class, 'render'])->name('supervisor.profile');
Route::post('/supervisor/agents/store', [SupervisorAgentController::class, 'store'])->name('supervisor.agents.store');
Route::get('/supervisor/agents', [SupervisorAgentController::class, 'index'])->name('supervisor.agents.index');
Route::get('/supervisor/agents/edit/{emp_id}', [SupervisorAgentController::class, 'edit'])->name('supervisor.agents.edit');
Route::post('/supervisor/agents/update/{emp_id}', [SupervisorAgentController::class, 'update'])->name('supervisor.agents.update');
Route::post('/supervisor/agents/delete/{emp_id}', [SupervisorAgentController::class, 'destroy'])->name('supervisor.agents.destroy');
Route::get('/supervisor/agents/filter', [SupervisorAgentController::class, 'filter'])->name('supervisor.agents.filter');

//reporter
Route::get('/reporter-dashboard', [ReporterChatHistory::class, 'render'])->name('reporter.dashboard');
Route::get('/reporter-chat-history', [ReporterChatHistory::class, 'render'])->name('reporter.chat.history');
Route::get('/reporter-profile', [ReporterProfile::class, 'render'])->name('reporter.profile');
Route::get('/reporter-users', [ ReporterUsers::class, 'render'])->name('reporter.reporter-users');




