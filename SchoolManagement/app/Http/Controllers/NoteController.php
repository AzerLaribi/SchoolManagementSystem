<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matieres;
use App\Models\Students;
use App\Models\Notes;
use App\Models\Teachers;
use App\Models\Classes;

class NoteController extends Controller
{
  public function index()
  {
    $matieres = Matieres::all();
    $students = Students::all();
    $teachers = Teachers::all();
    $notes = Notes::all();
    $classes = Classes::all();
    return view('notes.indexNote',compact('matieres','students','teachers','notes','classes'));
  }
  public function UploadNotes()
  {
    $matieres = Matieres::all();
    $students = Students::all();
    $teachers = Teachers::all();
    $classes = Classes::all();
    return view('notes.AjouterNote',compact('matieres','students', 'teachers','classes'));
  }
  public function Store(Request $request)
  {

    $notes = new Notes();
    $notes->Matiere_id = $request->input('Matiere_id');
    $notes->Student_id = $request->input('Student_id');
    $notes->Type = $request->input('Type');
    $notes->Valeur = $request->input('valeur');
    $notes->Remarque = $request->input('remarque');
    $notes->save();
    return redirect('/Notes')->with('status','La note: '.$notes->Valeur. ' en '.$notes->Type.' est bien ajouter');
  }
  public function updateNote(Request $request, $id)
  {
    $notes = Notes::findOrFail($id);
    $notes->Matiere_id = $request->input('Matiere_id');
    $notes->Student_id = $request->input('Student_id');
    $notes->Type = $request->input('Type');
    $notes->valeur = $request->input('valeur');
    $notes->update();
    return redirect('/AjouterNote')->with('status','La note est modifiée');
  }
  public function delete(Request $request, $id)
    {
      $notes = Notes::findOrFail($id);
      $notes->delete();
      return redirect('/Tache')->with('status','La note est effacée');
    }
}
