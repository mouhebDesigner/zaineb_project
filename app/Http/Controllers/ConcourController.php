<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Concour;
use Illuminate\Http\Request;
use App\Http\Requests\ProjetRequest;

class ConcourController extends Controller
{
    public function index(Request $request)
    {

        
        $concours = Concour::orderBy('created_at', 'desc')->paginate(10);
        return view('concours.index', compact('concours'));
    }

    public function show($id)
    {
        $concour = Concour::find($id);
        return view('concours.show', compact('concour'));
    }

    public function edit($id){
        $projet = Projet::find($id);
        return view('concours.edit', compact('projet'));
    }

    public function participer($id){
        return view('concours.participer', compact('id'));
    }

    public function store(ProjetRequest $request){
        $projet = Projet::create($request->all());
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
        return redirect('concours/'.$request->concour_id)->with('participer', 'Vous avez participé au concour avec succée');
    }
}
