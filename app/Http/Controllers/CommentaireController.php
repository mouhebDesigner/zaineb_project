<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Http\Requests\CommentaireRequest;

class CommentaireController extends Controller
{
    public function store(CommentaireRequest $request)
    {
        foreach(Projet::find($request->projet_id)->commentaires()->get() as $comment){
            $comment->delete();
        }
        Commentaire::create($request->all());

        return redirect('admin/projets/'.$request->projet_id);
    }
}
