<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use App\Models\Destination;
use Illuminate\Http\Request;

class AttractionController extends Controller
{
    public function index()
    {
        $keyword = request()->input('search');

        if ($keyword != '') {
            $attractions = Attraction::where('name', 'LIKE', "%{$keyword}%")->paginate(5);
        } else {
            $attractions = Attraction::paginate(5);
        }
        return view('pages.attraction.indexAttraction', compact('attractions'));
    }
    public function show($id)
    {
        $attractions = Attraction::findOrFail($id);
        return view('pages.attraction.detailAttraction', compact('attractions'));
    }
    public function create()
    {
        $destinations = Destination::all();
        return view('pages.attraction.createAttraction', compact('destinations'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'name' => 'required|min:3|max:100',
            'description' => 'required|min:5',
        ]);

        Attraction::create($request->all());
        return redirect('/attractions')->with('success', 'Attraction created successfully.');
    }
    public function edit($id)
    {
        $destinations = Destination::all();
         $attractions = Attraction::findOrFail($id);
        return view('pages.attraction.editAttraction', compact('attractions', 'destinations'));
    }
    public function delete($id)
    {
        $attractions = Attraction::find($id);
        if ($attractions) {
            $attractions->delete();
            return redirect('/attractions')->with('success', 'Attraction deleted successfully.');
        } else {
            return redirect('/attractions')->with('error', 'Attraction not found.');
        }
    }
    public function update(Request $request, $id)
    {
            $validated = $request->validate([
                'destination_id' => 'required|exists:destinations,id',
                'name' => 'required|min:3|max:100',
                'description' => 'required|min:5',
            ]);
            \App\Models\Attraction::findOrFail($id)->update($validated);
          


        $attractions = Attraction::findOrFail($id);
        if ($attractions) {
            $attractions->update($request->all());
            return redirect('/attractions')->with('success', 'Attraction updated successfully.');
        } else {
            return redirect('/attractions')->with('error', 'Attraction not found.');
        }
    }
}
