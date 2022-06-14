<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $table = 'module';
    protected $fillable = [
        'code',
        'designation',
        'niveau',
        'semestre',
        'code_fil',
    ];
    public function filiere(){
        return $this->belongsTo(Filiere::class,'code_fil');
    }
}
