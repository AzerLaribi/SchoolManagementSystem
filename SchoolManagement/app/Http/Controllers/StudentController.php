<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matieres;
use App\Models\Students;
use App\Models\Cours;
use App\Models\Teachers;
use App\Models\Classes;
use App\Models\Exercices;
use App\Models\Notes;
use App\Models\Students\ExerciceRemis;
use Carbon\Carbon;

class StudentController extends Controller
{
  public function indexCours()
  {
    $exercices = Exercices::all();
    $matieres = Matieres::all();
    $teachers = Teachers::all();
    $classes = Classes::all();
    $cours = Cours::all();
    $notes = Notes::all();
    $exerciceRemis = ExerciceRemis::all();
    return view('Students.Cours.indexCours',compact('matieres','teachers','classes','cours','exercices','exerciceRemis','notes'));
  }
  public function index()
    {
      $exercices = Exercices::all();
      $matieres = Matieres::all();
      $teachers = Teachers::all();
      $classes = Classes::all();
      $cours = Cours::all();
      $notes = Notes::all();
      $exerciceRemis = ExerciceRemis::all();
      return view('Students.indexStudent',compact('matieres','teachers','classes','cours','exercices','exerciceRemis','notes'));
    }
}
