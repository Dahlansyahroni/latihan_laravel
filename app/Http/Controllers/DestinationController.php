<?php

namespace App\Http\Controllers;
use App\Models\Destination;
use Illuminate\Http\Request;


class DestinationController extends Controller
{
    public function index(Request $request)
    {
       $keyword = $request->input('search');
      
        if ($keyword !='') {
            $destinations = Destination::where('nama', 'LIKE', "%{$keyword}%")->paginate(5);
        }else{
            $destinations = Destination::paginate(5);
        }
        return view('pages.destination.indexDestination', compact('destinations'));
    }   
    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        return view('pages.destination.destinasi1', compact('destination'));
    }
    public function create()
    {
        return view('pages.destination.createDestination');
    }
    public function store(Request $request)
    {
        Destination::create($request->all());
        return redirect('/destination')->with('success', 'Destination created successfully.');
    }
    public function delete($id)
    {
        $destination = Destination::find($id);
        if ($destination){
            $destination->delete();
            return redirect('/destination')->with('success', 'Destination deleted successfully.');
        }else{
        return redirect('/destination')->with('error', 'Destination not found.');
        }
    }
    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        return view('pages.destination.editDestination', compact('destination'));
    }
    public function update(Request $request, $id)
    {
      
        $destination = Destination::findOrFail($id);
        if ($destination) {
            $destination->update($request->all());
            return redirect('/destination')->with('success', 'Destination updated successfully.');
        } else {
            return redirect('/destination')->with('error', 'Destination not found.');
        }
    }
    
}