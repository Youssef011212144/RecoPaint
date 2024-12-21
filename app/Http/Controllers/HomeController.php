<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeVideo;
use App\Models\Video;
use App\Models\Products;

class HomeController extends Controller
{
    public function redirect() {
        $data=HomeVideo::paginate(4);
        return view('user.home',compact('data')); }
        public function showVideos() {
            $data = Video::paginate(2);  // Fetch videos from the database
            return view('user.videos',compact('data'));  // Return to the videos view
        }
        public function home(Request $request)
{
    // Get the search query from the request
    $query = $request->input('query');

    // Handle search explicitly for '0' and non-empty values
    if ($query !== null && $query !== '') {
        // Search for titles that contain the query, including when the query is '0'
        $data = HomeVideo::where('title', 'LIKE', '%' . $query . '%')->paginate(10); // Adjust per page if needed
    } else {
        // If no search query, paginate all records
        $data = HomeVideo::paginate(10);
    }

    // Return the view with the paginated data and query for the search bar
    return view('user.home', compact('data', 'query'));
}

public function cherchevideos(Request $request)
{
    // Get the search query from the request
    $query = $request->input('query');

    // If a search query exists, filter the products by title
    if ($query) {
        $data = Video::where('title', 'LIKE', '%' . $query . '%')->paginate(10); // Adjust the number per page
    } else {
        // If no search query, paginate all products
        $data = HomeVideo::paginate(10);
    }

    // Return the view with the paginated data
    return view('user.videos', compact('data', 'query'));
}
public function links()
    {
        $images = HomeVideo::all();  // Get all images from HomeVideo table
        $videos = Video::all();  // Get all videos from Video table
        
        return view('user.links', compact('images', 'videos'));
    }

    public function showVideo($id)
    {
        $video = Video::find($id);
        return view('user.video', compact('video'));
    }
    public function showProducts()
    {
        $data=Products::all();
        
        return view('user.products',compact('data'));
    }



        
        
   
}
