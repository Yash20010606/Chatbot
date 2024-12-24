<?php

use App\Livewire\Admin\AdminAgentManager;
use App\Livewire\Admin\AdminChatHistory;
use App\Livewire\Admin\AdminGroupManager;
use App\Livewire\Admin\AdminReporterManager;
use App\Livewire\Admin\AdminSkillManager;
use App\Livewire\Admin\AdminSupervisorManager;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Admin
Route::get('/dashboard', [AdminChatHistory::class, 'render'])->name('admin.dashboard');
Route::get('/chat-history', [AdminChatHistory::class, 'render'])->name('admin.chat-history');
Route::get('/agent', [AdminAgentManager::class, 'render'])->name('admin.agent');
Route::get('/supervisors', [AdminSupervisorManager::class, 'render'])->name('admin.supervisor');
Route::get('/reporters', [AdminReporterManager::class, 'render'])->name('admin.reporter');
Route::get('/groups', [AdminGroupManager::class, 'render'])->name('admin.group');
Route::get('/skill-manage', [AdminSkillManager::class, 'render'])->name('admin.skill');

