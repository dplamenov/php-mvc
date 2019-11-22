<?php

use Application\Route;

Route::get("/", 'Welcome@showForm');
Route::get("/{id}", 'Welcome@index');
Route::post('/', "Welcome@storeData");
