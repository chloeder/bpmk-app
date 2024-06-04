<?php

use App\Livewire\About;
use App\Livewire\DetailService;
use App\Livewire\Home;
use App\Livewire\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/service', Service::class)->name('service');
Route::get('/service/{id}', DetailService::class)->name('detail-service');
