<?php

namespace App\Http\Controllers\Admin;

use App\Models\Projet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjetRequest;

class ProjetController extends Controller
{
     public function index(){
        $projets = Projet::paginate(10);
        
        return view('admin.projets.index', compact('projets'));
    }

    public function show($id){
        $projet = Projet::find($id);
        return view('admin.projets.show', compact('projet'));
    }
    public function edit($id){
        return view('admin.projets.gagnant', compact('id'));
    }

    public function affectGagnant(Request $request){
        $projet = Projet::find($request->projet_id);
        $projet->gagnant = $request->gagnant;

        $projet->save();

        return redirect('admin/projets')->with('updated', 'Le gagnant à été affecté avec succé');
    }


    public function update(ProjetRequest $request, Projet $projet)
    {

        $projet->update($request->all());

        if($request->hasFile('prototype')){
            $projet->prototype =  $request->prototype->store('resources');
        }
        if($request->hasFile('bmc')){
            $projet->bmc =  $request->bmc->store('resources');
        }
        if($request->hasFile('planAffaire')){
            $projet->planAffaire =  $request->planAffaire->store('resources');
        }

        $projet->save();

        return redirect('profile');
    }

    public function destroy(Projet $projet)
    {
        
        $projet->delete();
        return response()->json([
            "deleted" => "Porjet a été supprimé"
        ]);
    }

}
