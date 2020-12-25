<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Teachers;
use App\Models\Matieres;
use App\Models\Classes;
use App\Models\User;
use App\Models\Exercices;
use Illuminate\Support\Facades\Auth;

class ExerciceController extends Controller
{
  public function index()
  {
    $exercices = Exercices::all();
    $matieres = Matieres::all();
    $teachers = Teachers::all();
    $classes = Classes::all();
    return view('Exercices.indexExercices',compact('matieres','teachers','classes','exercices'));
  }
  public function UploadExexrcices()
  {
    $exercices = Exercices::all();
    $matieres = Matieres::all();
    $teachers = Teachers::all();
    $classes = Classes::all();
    $cours = Cours::all();
    return view('Exercices.AjouterExercice',compact('matieres','teachers','classes','cours','exercices'));
  }
  public function AjouterExercices(Request $request)
  {
    $file = $request->file('file');
    $exercice = new Exercices();
    $exercice->name = $request->input('name');
    $fileName = uniqid($exercice->name) . '.' . $file->getClientOriginalExtension();
    $exercice->file_name = $fileName;
    $exercice->Description = $request->input('Description');
    $exercice->Teacher_id = Auth::user()->id;
    $exercice->Cours_id = $request->input('Cours_id');
    $exercice->Matiere_id = $request->input('Matiere_id');
    $exercice->Classe_id = $request->input('Classe_id');
    $exercice->deadline = $request->input('deadline');
    $file->move('public',$fileName);
    // $request->file->store('public');
    $exercice->save();
    return redirect('/Exercices')->with('status','Exercice '.$exercice->name.' ajouté');
  }

  public function delete($id)
    {
      $exercice = Exercices::findOrFail($id);
      $exercice->delete();
      return redirect('/Exercices')->with('status','Exercice '.$exercice->name.' éffacé');
    }
    public function download($id)
  {
      $dl = Exercices::findorFail($id);
      $path_to_file = public_path('/public/' . $dl->file_name);
      // return Storage::response($path_to_file);
      return response()->download($path_to_file, 'example.pdf', [], 'inline');

  }
}
