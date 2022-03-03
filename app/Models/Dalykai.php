<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dalykai extends Model
{
    use HasFactory;

    protected $table = 'dalykai';

    protected $fillable = [
        'pavadinimas'
    ];
}
