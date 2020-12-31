<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Teachers;
use App\Models\Matieres;
use App\Models\Students;
use App\Models\Classes;
use App\Models\User;
use App\Models\FichePresence;
use App\Models\StudentStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PresenceController extends Controller
{
  public function index()
  {
    $students = Students::all();
    $classes = Classes::all();
    $fichier = FichePresence::all();
    $teachers = Teachers::all();
    $matieres = Matieres::all();
    return view('Teachers.indexPresence',compact('fichier','teachers','matieres','students','classes'));
  }
  public function Presence()
  {
    $students = Students::all();
    $teachers = Teachers::all();
    $classes = Classes::all();
    $matieres = Matieres::all();
    $fichier = FichePresence::all();
    return view('Teachers.AjoutPresence',compact('matieres','teachers','classes','fichier','students','fichier'));
  }

  public function AjouterFichePresence(Request $request)
  {
    $matieres = Matieres::all();
    $students = Students::all();
    $classes = Classes::all();
    $fichier = new FichePresence();
    $fichier->Teacher_id = 1;
    $fichier->Classe_id = $request->input('Classe_id');
    $fichier->Matiere_id = $request->input('Matiere_id');
    $fichier->Jour = $request->input('Jour');
    $fichier->save();
    return redirect('/Presence')->with('status','La Fiche de  '.$fichier->Jour. ' est bien ajouter');
  }
  public function MarquerPresence()
  {
      $fichier = FichePresence::all();
      $presence = StudentStatus::all();
      $students = Students::all();
      $classes = Classes::all();
      $teachers = Teachers::all();
      $matieres = Matieres::all();
      return view('Teachers.indexEtatStudents',compact('matieres','teachers','classes','fichier','students','presence'));
  }
  public function EnregistrePresence(Request $request , $id)
  {
    $fichier = FichePresence::findorFail($id);;
    $presence = StudentStatus::all();
    $presence->FichePresence_id = $fichier->id;
    $presence->Students_id = $request->input('Students_id');
    $presence->Student_Status = $request->input('Student_Status');
    $presence->save();
    return redirect('/Presence')->with('status','La Fiche de  '.$fichier->Jour. ' est bien ajouter');

  }
}
