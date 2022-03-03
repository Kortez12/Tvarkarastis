<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patalpos extends Model
{
    use HasFactory;

    protected $table = 'patalpos';

    protected $fillable = [
        'pavadinimas',
        'numeris'
    ];
}
