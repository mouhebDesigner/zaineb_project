<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\price;
use Illuminate\Http\Request;
use App\Http\Requests\PriceRequest;
use RealRashid\SweetAlert\Facades\Alert;

class PriceController extends Controller
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
        $prices = Price::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.prices.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PriceRequest $request)
    {
        $price = Price::create($request->all());

       

        return redirect('admin/prices')->with('created', 'La prix a été créé avec succés');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        return view('admin.prices.edit', compact('price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(priceRequest $request, Price $price)
    {
        $price->update($request->all());

        

        return redirect()->route('admin.prices.index')->with('updated', 'La prix a été modifié avec succés');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        
        $price->delete();

        return response()->json([
            "deleted" => "price is deleted"
        ]);
    }

    public function deleteAll(Request $request)
    {
        foreach($request->items as $item){
            Price::find($item)->delete();
        }

        return response()->json([
            "deleted" => "prices are deleted"
        ]);
        
    }
}
