<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController;
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
Route::put('admin/plans/{url}',         [PlanController::Class,  'update']) -> name('plans.update');
Route::get('admin/plans/{url}/edit',    [PlanController::Class, 'edit'])   -> name('plans.edit');
Route::any('admin/plans/search',        [PlanController::Class, 'search']) -> name('plans.search');
Route::get('admin/plans',               [PlanController::Class, 'index'])  -> name('plans.index');
Route::get('admin/plans/create',        [PlanController::Class, 'create']) -> name('plans.create');
Route::post('admin/plans',              [PlanController::Class, 'store'])  -> name('plans.store');
Route::get('admin/plans/{url}',         [PlanController::Class, 'show'])   -> name('plans.show');
Route::delete('admin/plans/{url}',      [PlanController::Class, 'delete']) -> name('plans.delete');

Route::get('admin',          [PlanController::Class, 'index'])  -> name('admin.index');

Route::get('/', function () {
    return view('welcome');
});
