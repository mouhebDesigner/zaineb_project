<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\JuryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\enseignantRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
class JuryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {

        $enseignants = User::where('role', 'jury')->where('approuver', 1)->orderBy('created_at', 'desc')->paginate(10);
        if(str_contains($request->path(), 'admin') && Auth::user()->isStudent()){
            abort(404);
        }
        if(session('created')){
            Alert::success('Success Title', session('created'));
        }
        if(session('updated')){
            Alert::success('Success Title', session('updated'));
        }

        return view('admin.enseignants.index', compact('enseignants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.enseignants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JuryRequest $request)
    {
        $enseignant = new User();
        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->email = $request->email;
        $enseignant->password = Hash::make($request->password);
        $enseignant->numtel = $request->numtel;
        $enseignant->specialite = $request->specialite;
        $enseignant->role = "jury";
        $enseignant->approuver = 1;
        if($request->hasFile('avatar')){
            $enseignant->avatar = $request->avatar->store('resources');
        }
        $enseignant->save();


        return redirect('admin/enseignants')->with('added', 'L\'enseignant a été ajouté avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $enseignant)
    {

        return view('admin.enseignants.edit', compact('enseignant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $enseignant)
    {

        $validations_password = "";
        if($request->password != ""){
            $validations_password = "required | string | min:8 | confirmed";
        }
        $request->validate([
            'numtel' => "required | numeric | digits:8 | unique:users,numtel,".$enseignant->id.",id",
            "password" => $validations_password,
            "email" =>  "required | string | email | max:255 | unique:users,email,".$enseignant->id.",id",
            'nom' => 'required | string | max:255',
            'prenom' => 'required | string | max:255',
            'specialite' => 'required',
        ]);


        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->email = $request->email;
        if(isset($request->password)){
            $enseignant->password = Hash::make($request->password);
        }
        $enseignant->numtel = $request->numtel;
        $enseignant->specialite = $request->specialite;
        if($request->hasFile('avatar')){
            $enseignant->avatar = $request->avatar->store('resources');
        }

        $enseignant->save();



        return redirect('admin/enseignants')->with('updated', 'L\'enseignant a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $enseignant)
    {
        $enseignant->delete();
        
         return response()->json([
            "deleted" => "L'enseignant a été supprimer avec succés"
        ]);
        
        
    }
}
