<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\ExerciceController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Students\NoteStudentsController;
use App\Http\Controllers\Students\ExerciceStudentsController;
use App\Http\Controllers\StudentController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('Teachers.indexTeacher');
})->name('dashboard');

Route::get('/Teachers', function () {
    return view('Teachers.indexTeacher');
});
/*--------------------------------------Teachers--------------------------------------------------*/
Route::get('/AjouterCours',[CoursController::class, 'UploadCours']);
Route::post('/AjouterCours',[CoursController::class, 'UploadFile'])->name('uploadFile');
Route::get('/Cours',[CoursController::class, 'index']);
Route::get('/Exercices',[ExerciceController::class, 'index']);
Route::get('/AjouterExercices',[ExerciceController::class, 'UploadExexrcices']);
Route::post('/AjouterExercices',[ExerciceController::class, 'AjouterExercices'])->name('uploadExercice');
Route::get('/AjouterNotes',[NoteController::class, 'UploadNotes']);
Route::get('/Notes',[NoteController::class, 'index']);
Route::get('/Classes',[ClasseController::class, 'index']);
Route::get('/Feedback',[TeacherController::class, 'feedback']);
Route::post('/Store',[NoteController::class, 'store'])->name('Store');
Route::get('/Cours/{id}/Download',[CoursController::class , 'download'])->name('DownloadCours');
Route::delete('/Cours/{id}/Delete',[CoursController::class , 'delete'])->name('DeleteCours');
Route::get('/Exercices/{id}/Download',[ExerciceController::class , 'download'])->name('DownloadExercices');
Route::delete('/Exercices/{id}/Delete',[ExerciceController::class , 'delete'])->name('DeleteExercices');
/*--------------------------------------------------------------------------------------------------------------------*/



/*-------------------------------------Students-----------------------------------------------------------------*/

Route::get('/Students', [StudentController::class, 'index']);
Route::get('/NoteStudent',[NoteStudentsController::class, 'index']);
Route::get('/ExerciceStudents',[ExerciceStudentsController::class, 'index']);
Route::post('/ExerciceStudents',[ExerciceStudentsController::class, 'AjouterExercices']);
Route::post('/Exercices/{id}/Remis',[ExerciceStudentsController::class , 'RemisExercice'])->name('RemisExercice');
Route::get('/CourStudents',[StudentController::class, 'indexCours']);
