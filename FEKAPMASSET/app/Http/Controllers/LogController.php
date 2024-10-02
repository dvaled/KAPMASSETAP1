<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(){
        $Log = Log::all();
        return view('Log.index', compact('Log'));
    }

      // Show a single type
    public function show(Log $Log){
        return view('Log.show', compact('Log'));
    }

    public function create(){
        return view('Log.create');
    }

    public function store (Request $request){
        $request -> validate([
            "LogID" => 'required',
            "AssetID" => 'required',
            "RoleID" => 'required',
            "ActionPerformed"=> 'required',
            "UserAdded" => 'required',
            "DateAdded" => 'required'
        ]);
        Log::create($request->all());
        return redirect()->route('Log.index')->with('success', 'Log created successfully');
    }

    public function update(Request $request){
        $request -> validate([
            "LogID" => 'required',
            "AssetID" => 'required',
            "RoleID" => 'required',
            "ActionPerformed"=> 'required',
            "UserAdded" => 'required',
            "DateAdded" => 'required'
        ]);
        $Log = Log::find($request -> id);
        $Log->update($request->all());
        return redirect()->route('Log.index')->with('success', 'Log updated successfully');
    }

    public function delete(Log $Log){
        $Log->delete();
        return redirect()->route('Log.index')->with('success', 'Log deleted successfully');
    }
}
