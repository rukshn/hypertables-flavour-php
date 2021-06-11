<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HypertablesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// All the HyperTable api endpoints begin with _ht to not to clash with your exisiting API endpoints

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/_ht/get-tables', [HypertablesController::class, 'getTables']);

Route::get('/_ht/get-table-structure/{table}', [HypertablesController::class, 'getTableStructure']);

Route::post('/_ht/create-hyper-table', [HypertablesController::class, 'createHyperTable']);

Route::post('/_ht/create-hyper-column', [HypertablesController::class, 'createHyperColumn']);