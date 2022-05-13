<?php

namespace App\Models;

use Auth;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'numtel',
        'genre',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(){
        return Auth::user()->role == "admin";
    }
    public function isStudent(){
        return Auth::user()->role == "etudiant";
    }
    public function isJury(){
        return Auth::user()->role == "jury";
    }

    public function concours(){
        return $this->hasMany(Concour::class, 'projets', 'user_id', 'concour_id');
    }

    public function projet(){
        return $this->hasOne(Projet::class);
    }

    public function hasProjet(){
        return $this->projet != null;
    }
}
