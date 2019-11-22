<?php

use Application\Route;

Route::get("/", 'Welcome@index');
Route::get("/{id}", 'Welcome@index');
Route::post('/', "Welcome@storeData");
