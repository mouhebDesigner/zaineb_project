<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "concour_id",
        "user_id",
        "titre",
        "description"
    ];
    public function ressources(){
        return $this->hasMany(Ressource::class);
    }

   
}
