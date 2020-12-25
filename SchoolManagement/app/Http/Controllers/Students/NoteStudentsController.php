<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matieres;
use App\Models\Students;
use App\Models\Notes;
use App\Models\Teachers;
use App\Models\Classes;

class NoteStudentsController extends Controller
{
  public function index()
  {
    $matieres = Matieres::all();
    $students = Students::all();
    $teachers = Teachers::all();
    $notes = Notes::all();
    $classes = Classes::all();
    return view('Students.NoteStudents.indexNoteStudents',compact('matieres','students','teachers','notes','classes'));
  }
}
