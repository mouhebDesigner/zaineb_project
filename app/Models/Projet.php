<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        "concour_id",
        "user_id",
        "titre",
        "description"
    ];
    public function ressources(){
        return $this->hasMany(Ressource::class);
    }
    public function members(){
        return $this->hasMany(Member::class);
    }
    public function commentaires(){
        return $this->hasMany(Commentaire::class);
    }

    public function concour(){
        return $this->belongsTo(Concour::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
