<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    //display the list of "types"
    public function index(){
        $types = Master::all();
        return view('types.index', compact('types'));
    }

    //create page
    public function create(){
        return view('types.create');
    }

    public function store(Request $request){
        $request -> validate([
            "MASTERID" => 'required',
            "CONDITION"=> 'required',
            "NOSR" => 'required',
            "DESCRIPTION" => 'required',
            "VALUEGCM" => 'required',
            "TYPEGCM" => 'required',
            "ACTIVE" => 'required'
        ]);

        Master::create($request -> all());
        return redirect()->route('types.index')->with('success', 'Type created successfully');
    } 

    public function update(Request $request){
        $request -> validate([
            "MASTERID" => 'required',
            "CONDITION"=> 'required',
            "NOSR" => 'required',
            "DESCRIPTION" => 'required',
            "VALUEGCM" => 'required',
            "TYPEGCM" => 'required',
            "ACTIVE" => 'required'
        ]);
        $type = Master::find($request->id);
        $type->update($request->all());
        return redirect()->route('types.index')->with('success', 'Type updated successfully');        
    }

    public function delete(Master $type){
        $type -> delete();
        return redirect()->route('types.index')->with('success', 'Type deleted successfully');
    }
}
