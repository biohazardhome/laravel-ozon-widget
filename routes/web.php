<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index;

Route::get('/', [Index::class, 'index']);
