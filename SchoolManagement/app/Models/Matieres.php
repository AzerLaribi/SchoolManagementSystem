<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Matieres extends Model
{
    use HasFactory;
    //---------- Relation Matiere_Teachers ---------//
    public function Teachers()
      {
          return $this->HasMany(Teachers::class);
      }
    //---------- Relation Matiere_Students ---------//
    public function Students()
      {
          return $this->HasMany(Students::class);
      }
    //---------- Relation Matiere_Exercices ---------//
    public function Exercices()
      {
          return $this->HasMany(Matiere::class);
      }
    //---------- Relation Matiere_Cours ---------//
    public function cours()
      {
          return $this->hasMany(Cours::class);
      }
    //---------- Relation Matiere_Classes ---------//
    public function Classes()
      {
        return $this->HasMany(Classes::class);
      }
}
