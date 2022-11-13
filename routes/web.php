<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaysController;
use App\Http\Controllers\SlotsController;
use App\Http\Controllers\FoodItemsController;
use App\Http\Controllers\FoodCategoriesController;
use App\Http\Controllers\SlotPrefferedCategoriesController;
use App\Http\Controllers\CombinationsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryCombinationsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'days'=>DaysController::class,
    'slots'=>SlotsController::class,
    'fooditems'=>FoodItemsController::class,
    'slotprefferedcategories'=>SlotPrefferedCategoriesController::class,
    'foodcategories'=>FoodCategoriesController::class,
    'combinations'=>CombinationsController::class,
    'categorycombinations'=>CategoryCombinationsController::class,
]);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
