<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prof extends Model
{
    use HasFactory;
    protected $table = 'responsable_filiere';
    protected $fillable = [
        'nom',
        'prenom',
        'departement',
        'login',
    ];
}
