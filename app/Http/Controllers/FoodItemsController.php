<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodItem;

class FoodItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fooditems = FoodItem::all();
        return view('items.index', compact('fooditems'));
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
            'name'=>'required',
            'description'=>'required'
        ]);
        $item = FoodItem::create($data);
        return redirect('/fooditems')->with('message', 'suceess');
        // if($fooditem->save())
        // {
        //     return redirect('/fooditems.index')->with('message', 'suceess');
        // }
        // else
        // {
        //     return redirect('/fooditems.index')->with('message', 'failed');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FoodItem $fooditem)
    {
        return json_encode($fooditem);
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
    public function update(Request $request, FoodItem $fooditem)
    {
        $data = $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);
        if ($fooditem->update($data)){
            return redirect('/fooditems')->with('message','success');
        }else{
            return redirect('/fooditems')->with('message', 'failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodItem $fooditem)
    {
        if($fooditem->delete())
        {
            return redirect('/fooditems')->with('message','deleted');
        }
        else
        {
            return redirect('/fooditems')->with('message','failed to delete');
        }
    }
}
