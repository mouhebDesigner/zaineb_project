<?php

namespace App\Http\Controllers;

use App\Models\Concour;
use Illuminate\Http\Request;

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

    public function participer($id){
        return view('concours.participer', compact('id'));
    }
}
