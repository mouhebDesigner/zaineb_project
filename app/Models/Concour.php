<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concour extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'description','date_fin', 'date_debut', 'prix'];


    public function participants(){
        return $this->belongsToMany(User::class, 'projets', 'concour_id', 'user_id');
    }
    public function resources(){
        return $this->hasMany(Resource::class);
    }
    public function   deleteImages()
    {
        $this->resources()->where('type', 'image')->forceDelete();
    }
    public function deleteDocuments()
    {
        $this->resources()->where('type', 'attachment')->forceDelete();
    }

  
}
