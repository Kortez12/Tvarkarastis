<?php

namespace App\Models;

use App\Http\Controllers\TvarkarastisController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupes extends Model
{
    use HasFactory;

    protected $table = 'grupes';

    protected $fillable = [
        'pavadinimas',
        'kodas'
    ];

    public function grup()
    {
        return $this->hasMany(Tvarkarastis::class, 'grupes_id', 'id');
    }

}
