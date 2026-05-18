<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Projects;
use App\Livewire\ContactPage;

Route::get('/', Home::class)->name('home');
Route::get('/projects', Projects::class)->name('projects');
Route::get('/contact', ContactPage::class)->name('contact');