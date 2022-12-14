<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slot;

class SlotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slots = Slot::all();
        return view('slots.index', compact('slots'));
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
        $data = $request->validate([
            'name'=>'required|min:4',
            'description'=>'required'
        ]);
        $new_slot = slot::create($data);
        return redirect('/slots')->with('message',['type'=>'bg-green-500','body'=>'Created successifully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Slot $slot)
    {
        return json_encode($slot);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slot $slot)
    {
        $data = $request->validate([
            'name'=>'required|min:4',
            'description'=>'required'
        ]);
        $slot->name = $data['name'];
        $slot->description = $data['description'];
        if($slot->save()){
            return redirect('/slots')->with('message','success');
        }else{
            return redirect('/slots')->with('message','failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slot $slot)
    {
        if($slot->delete()){
            return redirect('/slots')->with('message','Deleted');
        }
        return redirect('/slots')->with('message','Failed to delete');
    }
}
