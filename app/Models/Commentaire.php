<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        "description",
        "projet_id",
        "user_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function commentaire(){
        return $this->belongsTo(Commentaire::class);
    }
}
