<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $history = History::all();
        return view('history.index', compact('history'));
    }

      // Show a single type
    public function show(History $history){
        return view('history.show', compact('history'));
    }

    public function create(){
        return view('history.create');
    }

    public function store (Request $request){
        $request -> validate([
            "IDASSETHISTORY" => "Required",
            "IDASSET" => "Required" ,
            "NIPP" => "Required",
            "NAME" => "Required",
            "POSITION" => "Required",
            "UNIT" => "Required",
            "DEPARTMENT" => "Required",
            "DIRECTORATE" => "Required",
            "PICADDED" => "Required",
            "DATEADDED" => "Required",
            "DATEUPDATED" => "Required"
        ]);
        History::create($request->all());
        return redirect()->route('history.index')->with('success', 'History created successfully');
    }

    public function update(Request $request){
        $request -> validate([
           "IDASSETHISTORY" => "Required",
            "IDASSET" => "Required" ,
            "NIPP" => "Required",
            "NAME" => "Required",
            "POSITION" => "Required",
            "UNIT" => "Required",
            "DEPARTMENT" => "Required",
            "DIRECTORATE" => "Required",
            "PICADDED" => "Required",
            "DATEADDED" => "Required",
            "DATEUPDATED" => "Required"
        ]);
        $history = History::find($request -> id);
        $history    ->update($request->all());
        return redirect()->route('history.index')->with('success', 'History updated successfully');
    }

    public function delete(History $history){
        $history->delete();
        return redirect()->route('history.index')->with('success', 'History deleted successfully');
    }
}
