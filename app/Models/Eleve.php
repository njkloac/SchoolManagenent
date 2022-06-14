<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    protected $table = 'eleve';
    protected $fillable = [
        'code',
        'nom',
        'prenom',
        'niveau',
        'code_fil',
        'login',
    ];
    public function filiere(){
        return $this->belongsTo(Filiere::class,'code_fil');
    }
}
