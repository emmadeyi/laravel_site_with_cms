<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\GalleryController;

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

Auth::routes();

Route::get('/', [WebsiteController::class, 'index'])->name('index');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/services', [WebsiteController::class, 'services'])->name('services');
Route::get('/equipment', [WebsiteController::class, 'equipment'])->name('equipment');
Route::get('/projects', [WebsiteController::class, 'projects'])->name('projects');
Route::get('equipment/{slug}', [WebsiteController::class, 'equipmentDetails'])->name('equipment.details');
Route::get('project/{slug}', [WebsiteController::class, 'projectDetails'])->name('project.details');
Route::get('page/{slug}', [WebsiteController::class, 'page'])->name('page');
Route::get('contact', [WebsiteController::class, 'showContactForm'])->name('contact.show');
Route::post('contact', [WebsiteController::class, 'submitContactForm'])->name('contact.submit');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/accounts', [HomeController::class, 'accounts'])->name('accounts');
    Route::post('/accounts', [HomeController::class, 'accounts_store'])->name('accounts.store');
    Route::get('/accounts/create', [HomeController::class, 'accounts_create'])->name('accounts.create');
    Route::get('/accounts/{account}', [HomeController::class, 'accounts_edit'])->name('accounts.edit');
    Route::put('/accounts/{account}', [HomeController::class, 'accounts_update'])->name('accounts.update');
    Route::delete('/accounts/{account}', [HomeController::class, 'accounts_destroy'])->name('accounts.destroy');
    Route::resource('fleets', EquipmentController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('galleries', GalleryController::class);
});

