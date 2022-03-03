<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destytojai extends Model
{
    use HasFactory;

    protected $table = 'destytojai';

    protected $fillable = [
        'vardas',
        'pavarde',
        'pareigos',
        'email'
    ];
}
