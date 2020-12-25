<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function feedback()
    {
      return view('Teachers.indexFeedback');
    }
}
