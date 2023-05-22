<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\GradeLearnerController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/grade_learner/store', [GradeLearnerController::class, 'store']);
Route::get('/grade_learner/index', [GradeLearnerController::class, 'index']);
Route::get('/grade_learner/show/{id}', [GradeLearnerController::class, 'show']);
Route::get('/grade_learner/last_grade_learner', [GradeLearnerController::class, 'last_grade_learner']);
Route::patch('/grade_learner/update/{id}', [GradeLearnerController::class, 'update']);
Route::delete('/grade_learner/destroy/{id}', [GradeLearnerController::class, 'destroy']);

Route::post('/grade/store', [GradeController::class, 'store']);
Route::get('/grade/index', [GradeController::class, 'index']);
Route::get('/grade/show/{id}', [GradeController::class, 'show']);
Route::get('/grade/distinct', [GradeController::class, 'distinctGrades']);
Route::patch('/grade/update/{id}', [GradeController::class, 'update']);
Route::delete('/grade/destroy/{id}', [GradeController::class, 'destroy']);
Route::get('/grade/count', [GradeController::class, 'count_grades']);
