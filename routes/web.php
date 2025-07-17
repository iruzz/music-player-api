<?php

use Illuminate\Support\Facades\Route;

// routes/web.php

Route::get('/login', function () {
    return 'Halaman login sementara';
})->name('login');
