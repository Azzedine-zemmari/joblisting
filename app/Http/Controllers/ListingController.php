<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;


class ListingController extends Controller
{
    //Show all listings
    public function index(){
        // dd(request('tag'));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag','search']))->get()
        ]);
    }
    
    //Show single listing
    public function show(Listing $listing){
        return view('listings.show',[
            'listing'=>$listing
        ]);
    }
    //show the create view
    public function create(){
        return view('listings.create');
    }
    public function store(Request $request){
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>'required|unique:listings|',
            'location'=>'required',
            'website'=>'required',
            'email'=>'required|email',
            'tags'=>'required',
            'description'=>'required'
        ]);
        Listing::create($formFields);
        

        return redirect('/')->with('message','listing created successfully!');
        
    }
}
