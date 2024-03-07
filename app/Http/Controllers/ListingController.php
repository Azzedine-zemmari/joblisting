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
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6)
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
        if($request->hasFile('logo')){
            $formFields['logo']= $request->file('logo')->store('logos','public');
        }
        //add ownerShip to listings
        $formFields['user_id'] = auth()->id();
        //after this i run this command to make image accessible in public folder php artisan storage:link
        Listing::create($formFields);
        

        return redirect('/')->with('message','listing created successfully!');
        
    }
    public function edit(Listing $listing){
        return view('listings.edit',['listing'=>$listing]);
    }

    public function update(Request $request,Listing $listing){
        //make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>'required',
            'location'=>'required',
            'website'=>'required',
            'email'=>'required|email',
            'tags'=>'required',
            'description'=>'required'
        ]);
        if($request->hasFile('logo')){
            $formFields['logo']= $request->file('logo')->store('logos','public');
        }
        //after this i run this command to make image accessible in public folder php artisan storage:link
        $listing->update($formFields);
        

        return back()->with('message','listing updated successfully!');
    }
    public function destroy(Listing $listing){
        //make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message','listing deleted successfully!');
    }
    public function manage(){
        return view('listings.manage',['listings'=> auth()->user()->listings()->get()]);
    }
}
