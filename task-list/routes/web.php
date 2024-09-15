<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello";
})-> name('hello');

Route::get('/hi', function() {
   return redirect()->route('hello'); 
});
Route::get('/greet/{name}', function($name){
    return "Hello $name";
});

Route::fallback(function (){
    return "Still got somewhere";
});
//GET
//POST
//PUT
//DELETE
