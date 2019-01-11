<?php
use Application\Route;
Route::get("/",function (){
    return \Application\Base::View('welcome');
});
Route::post('/',"Welcome@index2");