<?php

namespace App\Http\Controllers;

use App\Models\Software;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    public function index(){
        $software = Software::all();
        return view('software.index', compact('software'));
    }

      // Show a single type
    public function show(Software $software){
        return view('software.show', compact('software'));
    }

    public function create(){
        return view('software.create');
    }

    public function store (Request $request){
        $request -> validate([
        "IdSoftware" => 'required',
        "IdAsset"=> 'required',
        "SoftwareType"=> 'required',
        "SoftwareCategory"=> 'required',
        "SoftwareName"=> 'required',
        "SoftrwareLicense=> 'required'"
        ]);
        Software::create($request->all());
        return redirect()->route('software.index')->with('success', 'Software created successfully');
    }

    public function update(Request $request){
        $request -> validate([
            "IdSoftware" => 'required',
            "IdAsset"=> 'required',
            "SoftwareType"=> 'required',
            "SoftwareCategory"=> 'required',
            "SoftwareName"=> 'required',
            "SoftrwareLicense=> 'required'" 
        ]);
        $software = Software::find($request -> id);
        $software->update($request->all());
        return redirect()->route('software.index')->with('success', 'Software updated successfully');
    }

    public function delete(Software $software){
        $software->delete();
        return redirect()->route('software.index')->with('success', 'Software deleted successfully');
    }
}
