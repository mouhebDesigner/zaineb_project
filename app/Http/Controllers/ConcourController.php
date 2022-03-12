<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Concour;
use Illuminate\Http\Request;
use App\Http\Requests\ConcourRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ConcourController extends Controller
{
     public function __construct(){
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(str_contains($request->path(), 'admin') && Auth::user()->isStudent()){
            abort(404);
        }
        if(session('created')){
            Alert::success('Success Title', session('created'));
        }
        if(session('updated')){
            Alert::success('Success Title', session('updated'));
        }
        $concours = Concour::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.concours.index', compact('concours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.concours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConcourRequest $request)
    {
        $concour = Concour::create($request->all());

       

        return redirect('admin/concours')->with('created', 'La concour a été créé avec succés');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(concour $concour)
    {
        return view('admin.concours.edit', compact('concour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConcourRequest $request, concour $concour)
    {
        $concour->update($request->all());

        

        return redirect()->route('admin.concours.index')->with('updated', 'La concour a été modifié avec succés');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(concour $concour)
    {
        
        $concour->delete();

        return response()->json([
            "deleted" => "concour is deleted"
        ]);
    }

    public function deleteAll(Request $request)
    {
        foreach($request->items as $item){
            concour::find($item)->delete();
        }

        return response()->json([
            "deleted" => "concours are deleted"
        ]);
        
    }
}
