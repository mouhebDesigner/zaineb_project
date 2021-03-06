<?php

namespace App\Http\Controllers;

use App\Models\Member;
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


        foreach($request->members as $user){
            $member = new Member();
    
            $member->projet_id = $projet->id;
            $member->user_id = $user;
    
            $member->save();
        }

        return redirect('concours/'.$request->concour_id)->with('participer', 'Vous avez participé au concour avec succée');
    }
    public function update(ProjetRequest $request, $id){

        $projet = Projet::find($id);

        $projet->titre = $request->titre;
        $projet->description = $request->description;
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

        foreach($projet->members()->get() as $member)
        {
            $member->delete();
        }
        foreach($request->members as $user){
            $member = new Member();
    
            $member->projet_id = $projet->id;
            $member->user_id = $user;
    
            $member->save();
        }

        return redirect('concours/'.$projet->concour->id)->with('participer', 'Vous avez participé au concour avec succée');
    }
}
