<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        Commentaire::create($request->all());

        return redirect('admin/projets/'.$request->projet_id);
    }
}
