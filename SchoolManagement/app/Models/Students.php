<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    public function User()
      {
          return $this->BelongsTo(User::class);
      }
    //---------- Relation Students_Teachers ---------//
      public function Teachers()
        {
            return $this->HasMany(Teachers::class);
        }
      //---------- Relation Students_Cours ---------//
      public function Cours()
        {
            return $this->HasMany(Students::class);
        }
      //---------- Relation Students_Matieres ---------//
      public function Matiere()
        {
            return $this->HasMany(Matiere::class);
        }
      //---------- Relation Students_Exercices ---------//
      public function Exercices()
        {
            return $this->HasMany(Exercices::class);
        }
      //---------- Relation Students_Classes ---------//
      public function Classes()
        {
          return $this->BelongsTo(Exercices::class);
        }
}
