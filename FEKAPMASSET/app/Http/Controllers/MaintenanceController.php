<?php

namespace App\Http\Controllers;

use App\Models\maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index(){
        $maintenance = maintenance::all();
        return view('maintenance.index', compact('maintenance'));
    }

      // Show a single type
    public function show(maintenance $maintenance){
        return view('maintenance.show', compact('maintenance'));
    }

    public function create(){
        return view('maintenance.create');
    }

    public function store (Request $request){
        $request -> validate([
            "MAINTENANCEID"=> 'required',
            "IDASSET"=> 'required',
            "USERADDED"=> 'required',
            "NOTES"=> 'required',
            "DATEADDED"=> 'required'
        ]);
        maintenance::create($request->all());
        return redirect()->route('maintenance.index')->with('success', 'maintenance created successfully');
    }

    public function update(Request $request){
        $request -> validate([
            "MAINTENANCEID"=> 'required',
            "IDASSET"=> 'required',
            "USERADDED"=> 'required',
            "NOTES"=> 'required',
            "DATEADDED"=> 'required' 
        ]);
        $maintenance = maintenance::find($request -> id);
        $maintenance->update($request->all());
        return redirect()->route('maintenance.index')->with('success', 'maintenance updated successfully');
    }

    public function delete(maintenance $maintenance){
        $maintenance->delete();
        return redirect()->route('maintenance.index')->with('success', 'maintenance deleted successfully');
    }
}
