<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tvarkarastis extends Model
{
    use HasFactory;

    protected $table = 'tvarkarastis';

    /**
     * Get the blabla that owns the Tvarkarastis
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

        public function tdalykai()
        {
            return $this->hasMany(Dalykai::class, 'id', 'paskaitos_id');   
        }

        public function laikas()
        {
            return $this->hasMany(Laikas::class, 'id', 'laikas_id');
        }

        public function dienos()
        {
            return $this->hasMany(Dienos::class, 'id', 'dienos_id');
        }

        public function patalpos()
        {
            return $this->hasMany(Patalpos::class, 'id', 'patalpos_id');
        }

        public function destytojai()
        {
            return $this->hasMany(Destytojai::class, 'id', 'destytojai_id');
        }
        
        public function grupes()
        {
            return $this->hasMany(Grupes::class, 'id', 'grupes_id');
        }

}
