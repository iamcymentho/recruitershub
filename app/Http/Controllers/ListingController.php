<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('listings.index', [

            //add the filter like to be able to filter listing jobs based on the current resource_path and the current resource paths are specified via the tags being passed through the URL parameters

            //following the same sequence for the search bar . Adding the search to the tag in the filter like the following will result in the search bar.

            //------------------------------------
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
            //------------------------------------

            // to add pagination , we are going to switch get with paginate then pass parameters

            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->orderBy('listing_id', 'desc')->paginate(10)

            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(10)



        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //using the dependency injection mechanism
    {
        // dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')], //when specifying more than a rule you can use the array []. Note that when using unique in a rule you must state the table as well as the column name asset.
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'logo' => 'required',
            'description' => 'required'
        ]);


        //checking to see if the logo/picture field is not empty then store it in logos in the public folder
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            # code...
        }

        Listing::create($formFields); // if the form passes , then the model should create the information into the database



        return redirect('/')->with('message', 'Job listing created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        //
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        //
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'], //when specifying more than a rule you can use the array []. Note that when using unique in a rule you must state the table as well as the column name asset.
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'logo' => 'required',
            'description' => 'required'
        ]);

        // // Eloquent ORM - 
        // $listing = Listing::find($listing_id);

        // //database columns  //form fields name

        // $listing->title = $request->title;
        // $listing->company = $request->company;
        // $listing->location = $request->location;
        // $listing->website = $request->website;
        // $listing->email = $request->email;
        // $listing->tags = $request->tags;
        // $listing->logo = $request->logo;
        // $listing->description = $request->description;

        // $listing->update();


        //checking to see if the logo/picture field is not empty then store it in logos in the public folder
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            # code...
        }

        $listing->update($formFields); // if the form passes , then the model should create the information into the database


        // return back()->with('message', 'Listing Successfully updated');

        return redirect('/listings/{listing}/edit')->with('message', 'Job listing updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
