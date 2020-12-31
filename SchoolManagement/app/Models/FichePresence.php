<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichePresence extends Model
{
    use HasFactory;
    public function Teachers()
      {
          return $this->HasMany(Teachers::class);
      }
    //---------- Relation Classes_Students ---------//
    public function Students()
      {
          return $this->HasMany(Students::class);
      }
    //---------- Relation Classes_Matieres ---------//
    public function Matiere()
      {
          return $this->HasMany(Matiere::class);
      }
    public function Classe()
      {
          return $this->HasMany(Matiere::class);
      }
}
