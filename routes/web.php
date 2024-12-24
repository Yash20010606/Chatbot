<?php

use App\Livewire\Admin\AdminChatHistory;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Admin
Route::get('/dashboard', [AdminChatHistory::class, 'render'])->name('dashboard');
Route::get('/chat-history', [AdminChatHistory::class, 'render'])->name('chat-history');