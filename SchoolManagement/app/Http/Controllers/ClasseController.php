<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClasseController extends Controller
{
  public function index()
  {
    return view('Classes.indexClasse');
  }
}
