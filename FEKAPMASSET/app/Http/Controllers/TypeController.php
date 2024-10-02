<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    //display the list of "types"
    public function index(){
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    //create page
    public function create(){
        return view('types.create');
    }

    public function store(Request $request){
        $request -> validate([
            "MasterID" => 'required',
            "Condition"=> 'required',
            "NoSr" => 'required',
            "Description" => 'required',
            "ValueGcm" => 'required',
            "Type_Gcm" => 'required',
            "Active" => 'required'
        ]);

        Type::create($request -> all());
        return redirect()->route('types.index')->with('success', 'Type created successfully');
    } 

    public function update(Request $request){
        $request -> validate([
            "MasterID" => 'required',
            "Condition"=> 'required',
            "NoSr" => 'required',
            "Description" => 'required',
            "ValueGcm" => 'required',
            "Type_Gcm" => 'required',
            "Active" => 'required'
        ]);
        $type = Type::find($request->id);
        $type->update($request->all());
        return redirect()->route('types.index')->with('success', 'Type updated successfully');        
    }

    public function delete(Type $type){
        $type -> delete();
        return redirect()->route('types.index')->with('success', 'Type deleted successfully');
    }
}
