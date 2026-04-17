<?php

 namespace App\Http\Controllers;
       
        use App\Models\Review;
        use App\Models\Attraction;
       use Illuminate\Http\Request;
       
       class ReviewController extends Controller
       {
    public function index(Request $request)
           {
        $keyword = $request->input('search');

        if ($keyword != '') {
            $reviews = Review::with('attraction')
                ->where('reviewer_name', 'LIKE', "%{$keyword}%")
                ->orWhere('comment', 'LIKE', "%{$keyword}%")
                ->paginate(5);
        } else {
            $reviews = Review::with('attraction')->paginate(5);
        }
        
             return view('pages.review.indexReview', compact('reviews'));
         }
       
          public function create()
           {
               $attractions = Attraction::all();
              return view('pages.review.createReview', compact('attractions'));
           }
      
           public function store(Request $request)
         {
               $validatedData = $request->validate([
                  'attraction_id' => 'required|exists:attractions,id',
                   'reviewer_name' => 'required|string|max:255',
                  'comment' => 'required|string',
              ]);
      
              Review::create($validatedData);
      
              return redirect()->route('reviews.index')->with('success', 'Review created successfully.');
           }
       
           public function edit($id)
           {
               $review = Review::findOrFail($id);
               $attractions = Attraction::all();
               return view('pages.review.editReview', compact('review', 'attractions'));
           }
     
           public function update(Request $request, $id)
           {
               $validatedData = $request->validate([
                   'attraction_id' => 'required|exists:attractions,id',
                   'reviewer_name' => 'required|string|max:255',
                   'comment' => 'required|string',
               ]);
       
        $reviews = Review::findOrFail($id);
        $reviews->update($validatedData);
      
              return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
         }
      
          public function delete($id)
          {
        $reviews = Review::findOrFail($id);
        $reviews->delete();
       
               return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
           }
       
           public function show($id)
           {
        $reviews = Review::with('attraction')->findOrFail($id);
        return view('pages.review.detailReview', compact('reviews'));
           }
  }
