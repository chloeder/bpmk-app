<?php

use App\Livewire\About;
use App\Livewire\DetailService;
use App\Livewire\Home;
use App\Livewire\Sejarah;
use App\Livewire\Service;
use App\Livewire\Struktur;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/service', Service::class)->name('service');
Route::get('/service/{id}', DetailService::class)->name('detail-service');
Route::get('/history', Sejarah::class)->name('history');
Route::get('/structure', Struktur::class)->name('structure');
