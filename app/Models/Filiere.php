<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;
    protected $table = 'filiere';
    protected $fillable = [
        'code',
        'designation',
        'responsable',
    ];
    public function eleve(){
        return $this->hasMany(Eleve::class);
    }
    public function modules(){
        return $this->hasMany(Module::class);
    }
}
