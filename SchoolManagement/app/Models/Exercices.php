<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercices extends Model
{
    use HasFactory;
    //---------- Relation Cours_Teachers ---------//
    public function Teachers()
      {
          return $this->HasMany(Teachers::class);
      }
    //---------- Relation Cours_Students ---------//
    public function Students()
      {
          return $this->HasMany(Students::class);
      }
    //---------- Relation Cours_Matieres ---------//
    public function Matiere()
      {
          return $this->BelongsTo(Matiere::class);
      }
    //---------- Relation Cours_Exercices ---------//
    public function Cours()
      {
          return $this->BelongsTo(Exercices::class);
      }
    //---------- Relation Cours_Classes ---------//
    public function Classes()
      {
        return $this->HasMany(Exercices::class);
      }
    public function ExerciceRemis()
      {
        return $this->HasMany(ExerciceRemis::class);
      }

}
