<?php

use App\Http\Controllers\Admin\AdminGroupController;
use App\Http\Controllers\Admin\AdminSkillController;
use App\Http\Controllers\AuthController;
use App\Livewire\Admin\AdminAgentManager;
use App\Livewire\Admin\AdminChatHistory;
use App\Livewire\Admin\AdminDashboardExtended;
use App\Livewire\Admin\AdminGroupManager;
use App\Livewire\Admin\AdminProfile;
use App\Livewire\Admin\AdminReporterManager;
use App\Livewire\Admin\AdminSkillManager;
use App\Livewire\Admin\AdminSupervisorManager;
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
Route::post('/groups', [AdminGroupController::class, 'store'])->name('group.store');
Route::put('/groups/{group}', [AdminGroupController::class, 'update'])->name('group.update');

//supervisor
Route::get('/supervisor-dashboard', [SupervisorChatHistory::class, 'render'])->name('supervisor.dashboard');
Route::get('/supervisor-chat-history', [SupervisorChatHistory::class, 'render'])->name('supervisor.chat.history');
Route::get('/supervisor-agent', [SupervisorAgentManager::class, 'render'])->name('supervisor.agent');
Route::get('/supervisor-profile', [SupervisorProfile::class, 'render'])->name('supervisor.profile');

//reporter
Route::get('/reporter-dashboard', [ReporterChatHistory::class, 'render'])->name('reporter.dashboard');
Route::get('/reporter-chat-history', [ReporterChatHistory::class, 'render'])->name('reporter.chat.history');
Route::get('/reporter-profile', [ReporterProfile::class, 'render'])->name('reporter.profile');
Route::get('/reporter-users', [ ReporterUsers::class, 'render'])->name('reporter.reporter-users');




