<?php

namespace App\Http\Controllers;
use App\Models\Attraction;
use Illuminate\Http\Request;

class AttractionController extends Controller
{
    public function index()
    {
       $keyword = request()->input('search');
      
        if ($keyword !='') {
            $attractions = Attraction::where('name', 'LIKE', "%{$keyword}%")->paginate(5);
        }else{
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
        return view('pages.attraction.createAttraction');
    }
    public function store(Request $request)
    {
        Attraction::create($request->all());
        return redirect('/attractions')->with('success', 'Attraction created successfully.');

    }
    public function edit($id)
    {
        $attractions = Attraction::findOrFail($id);
        return view('pages.attraction.updateAttraction', compact('attractions'));
    }
    public function delete($id)
    {
        $attractions = Attraction::find($id);
        if ($attractions){
            $attractions->delete();
            return redirect('/attractions')->with('success', 'Attraction deleted successfully.');
        }else{
        return redirect('/attractions')->with('error', 'Attraction not found.');
        }
    }
    public function update(Request $request, $id)
    {
        $attractions = Attraction::findOrFail($id);
        if ($attractions) {
            $attractions->update($request->all());
            return redirect('/attractions')->with('success', 'Attraction updated successfully.');
        } else {
            return redirect('/attractions')->with('error', 'Attraction not found.');
        }
    }
}
