<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\CheckPointController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PatrolManController;
use App\Http\Controllers\PatrolTaskController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RouteCheckpointController;
use App\Http\Controllers\RouteController;
use App\Models\Organization;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [AuthenticationController::class, 'Login'])->name('login');
Route::get('/', [HomeController::class, 'home'])->name('home')->middleware('auth');

Route::prefix('/organizations')->name('organizations.')->middleware('auth')->group(function () {

    Route::post('/store', [OrganizationController::class, 'store'])->name('store');
    Route::post('/update/{organization_id}', [OrganizationController::class, 'update'])->name('update');
    Route::get('/', [OrganizationController::class, 'index'])->name('index');
    Route::post('/delete/{organization_id}', [OrganizationController::class, 'destroy']);
    Route::get('/get-ajax', [OrganizationController::class, 'getOrganizationsAjax']);
});

Route::prefix('/patrolman')->name('patrolman.')->middleware('auth')->group(function () {
    Route::post('/store', [PatrolManController::class, 'store'])->name('store');
    Route::post('/update', [PatrolManController::class, 'update'])->name('update');
    Route::post('/delete', [PatrolManController::class, 'destroy'])->name('delete');
    Route::get('/', [PatrolManController::class, 'index'])->name('index');
    Route::get('/get-ajax', [PatrolManController::class, 'getPatrolman']);
    Route::get('/listByAreaId', [PatrolManController::class, 'listByAreaId']);
});


Route::prefix('/accounts')->name('accounts.')->middleware('auth')->group(function () {
    Route::post('/store', [AccountsController::class, 'store'])->name('store');
    Route::post('/update', [AccountsController::class, 'update'])->name('update');
    Route::get('/', [AccountsController::class, 'index'])->name('index');
    Route::post('/delete', [AccountsController::class, 'destroy'])->name('delete');
    Route::get('/get', [AccountsController::class, 'getUser']);
    Route::get('/get-ajax', [AccountsController::class, 'getAccounts']);
});

Route::prefix('/roles')->name('roles.')->middleware('auth')->group(function () {
    Route::post('/store', [RoleController::class, 'store'])->name('store');
    Route::post('/update', [RoleController::class, 'update'])->name('update');
    Route::post('/delete', [RoleController::class, 'destroy'])->name('delete');
    Route::get('/', [RoleController::class, 'index'])->name('index');
    Route::get('/get-ajax', [RoleController::class, 'getRolesAjax']);
    Route::get('/get', [RoleController::class, 'getRole']);
    Route::get('/listPrivilegeTree', [RoleController::class, 'getPermissionsAjax']);
});
Route::prefix('/routes')->name('routes.')->middleware('auth')->group(function () {
    Route::post('/store', [RouteController::class, 'store'])->name('store');
    Route::post('/update', [RouteController::class, 'update'])->name('update');
    Route::post('/delete', [RouteController::class, 'destroy'])->name('delete');
    Route::get('/', [RouteController::class, 'index'])->name('index');
    Route::get('/get-ajax', [RouteController::class, 'getRoutes']);
});

Route::prefix('/route_checkpoint')->name('route_checkpoint.')->middleware('auth')->group(function () {
    Route::post('/store', [RouteCheckpointController::class, 'store'])->name('store');
    Route::post('/update', [RouteCheckpointController::class, 'update'])->name('update');
    Route::post('/delete', [RouteCheckpointController::class, 'destroy'])->name('delete');
    Route::get('/get-ajax/{route_id}', [RouteCheckpointController::class, 'getRouteCheckpoints']);
    Route::get('/listByLineNotExist', [RouteCheckpointController::class, 'listByLineNotExist']);
    Route::get('/{route_id}', [RouteCheckpointController::class, 'index'])->name('index');
});



//patrol management section
Route::prefix('/checkpoint')->name('checkpoint.')->middleware('auth')->group(function () {
    Route::post('/store', [CheckPointController::class, 'store'])->name('store');
    Route::post('/update', [CheckPointController::class, 'update'])->name('update');
    Route::post('/delete', [CheckPointController::class, 'destroy'])->name('delete');
    // Route::get('/get', [AccountsController::class, 'getUser']);
    Route::get('/get-ajax', [CheckPointController::class, 'getCheckpoints']);
    Route::get('/', [CheckPointController::class, 'index'])->name('index');
});


//patrol management section
Route::prefix('/device')->name('device.')->middleware('auth')->group(function () {
    Route::post('/store', [DeviceController::class, 'store'])->name('store');
    Route::post('/update', [DeviceController::class, 'update'])->name('update');
    Route::post('/deviecSetting', [DeviceController::class, 'deviecSetting'])->name('deviecSetting');
    Route::post('/delete', [DeviceController::class, 'destroy'])->name('delete');
    Route::get('/get-ajax', [DeviceController::class, 'getDevices']);
    Route::get('/', [DeviceController::class, 'index'])->name('index');
});

//patrol management section
Route::prefix('/patrol_task')->name('patrol_task.')->middleware('auth')->group(function () {
    Route::post('/store', [PatrolTaskController::class, 'store'])->name('store');
    Route::post('/update', [PatrolTaskController::class, 'update'])->name('update');
    Route::post('/delete', [PatrolTaskController::class, 'destroy'])->name('delete');
    Route::get('/get-ajax', [PatrolTaskController::class, 'getDevices']);
    Route::get('/', [PatrolTaskController::class, 'index'])->name('index');
    Route::get('/lineTree', [PatrolTaskController::class, 'routeLineTree']);
});
