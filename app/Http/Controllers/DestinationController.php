<?php

namespace App\Http\Controllers;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $validated = $request->validate([
            'nama' => 'required|min:3|max:100',
            'description' => 'required|min:10|max:200',
            'location' => 'required',
            'working_days' => 'required',
            'working_hours' => 'required',
            'ticket_price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,webp',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
            $validated['image'] = basename($imagePath);
        }

        Destination::create($validated);

        return redirect('/destinations')->with('success', 'Destination created successfully.');
    }
    public function delete($id)
    {
        $destination = Destination::find($id);
        if ($destination){
            $destination->delete();
            return redirect('/destinations')->with('success', 'Destination deleted successfully.');
        }else{
        return redirect('/destinations')->with('error', 'Destination not found.');
        }
    }
    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        return view('pages.destination.editDestination', compact('destination'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|min:3|max:100',
            'description' => 'required|min:10|max:256',
            'location' => 'required',
            'working_days' => 'required',
            'working_hours' => 'required',
            'ticket_price' => 'required',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,webp',
        ]);

        $destination = Destination::findOrFail($id);
    
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($destination->image) {
                Storage::disk('public')->delete('image/' . $destination->image);
            }
            $imagePath = $request->file('image')->store('image', 'public');
            $validated['image'] = basename($imagePath);
        }
       
        $destination->update($validated);
        
        return redirect('/destinations')->with('success', 'Destination updated successfully.');
    }
    
}