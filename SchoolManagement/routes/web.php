<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\ExerciceController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\Students\NoteStudentsController;
use App\Http\Controllers\Students\ExerciceStudentsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FullCalendarEventMasterController;
use App\Http\Controllers\GenerateQrCodeController;

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


/*--------------------------------Fiche de Presence--------------------------------------------------*/
Route::get('/Presence',[PresenceController::class, 'index']);
Route::get('/AjoutFichePresence',[PresenceController::class, 'Presence']);
Route::post('/AjoutFichePresence',[PresenceController::class, 'AjouterFichePresence'])->name('AjoutPresence');
Route::get('/Fiche/{id}/Présence',[PresenceController::class, 'MarquerPresence'])->name('MarquerPresence');
Route::post('/Fiche/{id}/Présence',[PresenceController::class, 'EnregistrePresence'])->name('EnregistrePresence');
// Route::post('/AjoutEtat',[PresenceController::class, 'AjouterPresence'])->name('AjoutEtat');
/*--------------------------------------------------------------------------------------------------------------------*/



/*-------------------------------------Students-----------------------------------------------------------------*/

Route::get('/Students', [StudentController::class, 'index']);
Route::get('/NoteStudent',[NoteStudentsController::class, 'index']);
Route::get('/ExerciceStudents',[ExerciceStudentsController::class, 'index']);
Route::post('/ExerciceStudents',[ExerciceStudentsController::class, 'AjouterExercices']);
Route::post('/Exercices/{id}/Remis',[ExerciceStudentsController::class , 'RemisExercice'])->name('RemisExercice');
Route::get('/CourStudents',[StudentController::class, 'indexCours']);
/*------------------------------------------------------------------------------------------------------------------------------*/



/*--------------------------------------------------Full Calendar-----------------------------------------------------------------------*/
Route::get('/fullcalendareventmaster',[FullCalendarEventMasterController::class,'index']);
Route::post('/fullcalendareventmaster/create',[FullCalendarEventMasterController::class,'create']);
Route::post('/fullcalendareventmaster/update',[FullCalendarEventMasterController::class,'update']);
Route::post('/fullcalendareventmaster/delete',[FullCalendarEventMasterController::class,'destroy']);
/*--------------------------------------------------------------------------------------------------------------------------------------*/





/*-------------------------------------------------QR-Code-----------------------------------------------------------------------*/
Route::get('/simple-qr-code', [GenerateQrCodeController::class, 'simpleQrCode']);
Route::get('/color-qr-code', [GenerateQrCodeController::class, 'colorQrCode']);
Route::get('/image-qr-code', [GenerateQrCodeController::class, 'imageQrCode']);
