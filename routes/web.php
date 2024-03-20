<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Widget;

Route::get('/', [Widget::class, 'index']);
