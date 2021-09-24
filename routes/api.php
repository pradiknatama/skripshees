<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sensorControl;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::post('/up1', function (\Illuminate\Http\Request $request) {
//     \Illuminate\Support\Facades\Storage::append("arduino-log.txt",
//         "Time: " . now()->format("Y-m-d H:i:s") . ', ' .
//         "Jarak: " . $request->get("Jarak", "n/a") . '°C, ' .
//     );
// });
Route::get('/up', [sensorControl::class, 'store']);
// Route::get('/post', [sensorControl::class, 'store']);