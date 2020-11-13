<?php

namespace App\Http\Controllers;

use App\Perpus;
use Illuminate\Http\Request;

class PerpusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perpus ['perpuses'] = Perpus::OrderBy('id','asc')->paginate(10);

        return view('perpus.index',$perpus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perpus=array(
        'name'=>$request->name,
        'year'=>$request->year,
        'author'=>$request->author,
        'publisher'=>$request->publisher,
        'country'=>$request->country );
        Perpus::create($perpus);
        return redirect()->route('perpus.index')->with('success', 'Book information successfully added');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perpus  $perpus
     * @return \Illuminate\Http\Response
     */
    public function show(Perpus $perpus)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perpus  $perpus
     * @return \Illuminate\Http\Response
     */
    public function edit(Perpus $perpus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perpus  $perpus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $perpus=array(
            'name'=>$request->name,
            'year'=>$request->year,
            'author'=>$request->author,
            'publisher'=>$request->publisher,
            'country'=>$request->country );

        Perpus::findOrfail($request->perpus_id)->update($perpus);
        return redirect()->route('perpus.index')->with('success', 'Book information successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perpus  $perpus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $perpus)
    {
        $delete = $perpus->all();

        $deleteperpus = Perpus::findOrfail($perpus->perpus_id);
        $deleteperpus->delete();
        return redirect()->route('perpus.index')->with('success', 'Book information successfully deleted');;
    }
}
