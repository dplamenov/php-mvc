<?php
use Application\Route;
Route::get("/",'Welcome@showForm');
Route::post('/',"Welcome@storeData");