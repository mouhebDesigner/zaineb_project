<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concour extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'description','date_fin'];

    public function price(){
        return $this->belongsTo(Price::class);
    }
}
