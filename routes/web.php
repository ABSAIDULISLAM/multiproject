<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\Backend\LicenceController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ecommerce\BrandController;
use App\Http\Controllers\ecommerce\CategoryController;
use App\Http\Controllers\ecommerce\DashboardController;
use App\Http\Controllers\ecommerce\ProductController;
use App\Http\Controllers\KachariController;
use App\Http\Controllers\LicenceTypeController;
use App\Http\Controllers\MouzaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UpzilaController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('admin/')->middleware(['auth', 'admin'])->group(function(){

    Route::resource('kachari', KachariController::class);
    Route::resource('station', StationController::class);
    Route::resource('mouza', MouzaController::class);
    Route::resource('licence-type', LicenceTypeController::class);
    Route::resource('distrct', DistrictController::class);
    Route::resource('upzila', UpzilaController::class);

    Route::get('licence/filter', [LicenceController::class, 'index'])->name('licence');
    Route::get('licence/add', [LicenceController::class, 'create'])->name('licence.add');
    Route::post('licence/save', [LicenceController::class, 'store'])->name('licence.save');
    Route::post('licence/view', [LicenceController::class, 'licenceSearchByLicenceNumber'])->name('licence_search_number');

    // for ajax actions routes
    Route::get('thana', [AjaxController::class, 'thanaInfo'])->name('thana');
    Route::get('union', [AjaxController::class, 'unionInfo'])->name('union');
    Route::get('mouza', [AjaxController::class, 'mouzaInfo'])->name('mouza');
    Route::get('kachari', [AjaxController::class, 'kachariInfo'])->name('kachari');
    Route::get('station', [AjaxController::class, 'stationInfo'])->name('station');
    Route::get('stationnumber', [AjaxController::class, 'stationnumberInfo'])->name('stationnumber');
    Route::get('licencetype', [AjaxController::class, 'licencetypeInfo'])->name('licencetype');
    Route::get('lctosl', [AjaxController::class, 'lctoslInfo'])->name('lctosl');

});


Route::prefix('ecommerce')->middleware(['auth', 'admin'])->group(function(){

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('ecommerce.dashboard');

    Route::resource('category', CategoryController::class);

    Route::resource('brand', BrandController::class);

    Route::resource('product', ProductController::class);

});


