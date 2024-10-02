<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $History = History::all();
        return view('History.index', compact('History'));
    }

      // Show a single type
    public function show(History $History){
        return view('History.show', compact('History'));
    }

    public function create(){
        return view('History.create');
    }

    public function store (Request $request){
        $request -> validate([
            "IdAssetHistory" => "Required",
            "IdAsset" => "Required" ,
            "NIPP" => "Required",
            "Name" => "Required",
            "Position" => "Required",
            "Unit" => "Required",
            "Department" => "Required",
            "Directorate" => "Required",
            "PICAdded" => "Required",
            "DateAdded" => "Required",
            "DateUpdated" => "Required"
        ]);
        History::create($request->all());
        return redirect()->route('History.index')->with('success', 'History created successfully');
    }

    public function update(Request $request){
        $request -> validate([
           "IdAssetHistory" => "Required",
            "IdAsset" => "Required" ,
            "NIPP" => "Required",
            "Name" => "Required",
            "Position" => "Required",
            "Unit" => "Required",
            "Department" => "Required",
            "Directorate" => "Required",
            "PICAdded" => "Required",
            "DateAdded" => "Required",
            "DateUpdated" => "Required"
        ]);
        $History = History::find($request -> id);
        $History->update($request->all());
        return redirect()->route('History.index')->with('success', 'History updated successfully');
    }

    public function delete(History $History){
        $History->delete();
        return redirect()->route('History.index')->with('success', 'History deleted successfully');
    }
}
