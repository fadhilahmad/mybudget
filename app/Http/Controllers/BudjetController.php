<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budjet;

class BudjetController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $budjet = Budjet::all();
        //dd($budjet);
        return view('budjet.index', compact('budjet'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('budjet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $budjet = new Budjet([
          'item' => $request->get('item'),
          'price' => $request->get('price'),
          'tag' => $request->get('tag'),
          'date' => $request->get('date')
        ]);

        $budjet->save();
        return redirect('/budjet');
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
    public function edit($id)
    {
        
        $budjet = Budjet::find($id);
        
        return view('budjet.edit', compact('budjet','id'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) //public function update(Request $request,$id)
    {
        
        $budjet = Budjet::find($request->id);
        $budjet->item = $request->get('item');
        $budjet->price = $request->get('price');
        $budjet->tag = $request->get('tag');
        $budjet->date = $request->get('date');
        $budjet->save();
                
        //dd($budjet);
        return redirect('/budjet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        
//        $budjet = Budjet::find($id);
//        $budjet->delete();
        
        Budjet::where('id',$request->id)->delete();      
        return redirect('/budjet');
        
    }
    
    public function filter(request $request)
    {
       $month = $request->get('month');
       $year = $request->get('year');
       $query = Budjet::whereRaw('MONTH(date) = '.$month);
      // $filter = $query->addSelect('YEAR(date) = '.$year)->get();

       return $query;
    }
}
