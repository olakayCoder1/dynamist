<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Resources\InputTypeResource;
use App\Models\InputType;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('welcome');
});


Route::get('/dashboard', function () {
    //return view('welcome');
    return view('auth/dashboard', ['title' => 'Admin Dashboard']);
})->name('dashboard');

Route::get('/myforms', function () {
    return view('forms/all');
})->name('my_form');


Route::get('/myforms/create', function () {
    $inputs = InputType::get()
            ->transform(function($item){
                return (new InputTypeResource($item));
            });
    return view('forms/create', ['title' => 'Olakay', 'inputs'=> $inputs]);
})->name('new_form');


Route::get('/myforms/preview', function () {
    //return view('welcome');
    return view('forms/preview');
})->name('formPreview');

