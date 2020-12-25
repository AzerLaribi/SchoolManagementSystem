<?php

namespace App\Models\Students;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciceRemis extends Model
{
  use HasFactory;

  public function Exercice()
    {
      return $this->BelongsTo(Exercices::class);
    }
}
