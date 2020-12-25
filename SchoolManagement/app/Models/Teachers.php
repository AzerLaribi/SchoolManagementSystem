<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;
    public function User()
      {
          return $this->BelongsTo(User::class);
      }
    //---------- Relation Teacher_Student ---------//
      public function Students()
        {
            return $this->HasMany(Teachers::class);
        }
      //---------- Relation Teacher_Cours ---------//
      public function Cours()
        {
            return $this->HasMany(Students::class);
        }
      //---------- Relation Teacher_Matieres ---------//
      public function Matiere()
        {
            return $this->HasMany(Matiere::class);
        }
      //---------- Relation Teacher_Exercices ---------//
      public function Exercices()
        {
            return $this->HasMany(Exercices::class);
        }
      //---------- Relation Teacher_Classes ---------//
      public function Classes()
        {
          return $this->HasMany(Exercices::class);
        }
}
