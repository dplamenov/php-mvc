<?php

use Application\Route;

Route::get("/",'Welcome@showForm');
Route::get("/{id}", 'Welcome@showForm');
Route::post('/',"Welcome@storeData");