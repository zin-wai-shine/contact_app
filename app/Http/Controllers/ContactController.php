<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::search()->latest('id')->get();
        $colors = ['#c94cbe', '#016612', '#ffa010',' #660077', '#d72323', '#1e2a78', '#ea7dc7'];
        return view('contact.index', compact('contacts', 'colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        $contact = new Contact();
        $contact->first_name = $request->firstName;
        $contact->last_name = $request->lastName;

        if($request->hasFile('featuredImg')){
            $newName = $request->file('featuredImg')->store("public/featuredImg");
            $contact->featured_img = $newName;
        }

        if($request->company){
            $contact->company = $request->company;
        }
        if($request->jobTitle){
            $contact->job_title = $request->jobTitle;
        }
        if($request->email){
            $contact->email = $request->email;
        }
        $contact->phone = $request->phone;
        if($request->birthday){
            $contact->birthday = $request->birthday;
        }
        if($request->note){
            $contact->note = $request->note;
        }
        $contact->user_id = Auth::user()->id;

        $contact->save();
        return redirect()->route('contact.index')->with("status", "contact is created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $contact->first_name = $request->firstName;
        $contact->last_name = $request->lastName;

        if($request->hasFile('featured_img')){
            $newName = $request->file('featured_img')->store("public/featuredImg");
            $contact->featured_img = $newName;
        }

        if($request->company){
            $contact->company = $request->company;
        }
        if($request->jobTitle){
            $contact->job_title = $request->jobTitle;
        }
        if($request->email){
            $contact->email = $request->email;
        }
        $contact->phone = $request->phone;
        if($request->birthday){
            $contact->birthday = $request->birthday;
        }
        if($request->note){
            $contact->note = $request->note;
        }

        $contact->update();
        return redirect()->route('contact.index')->with("status", "contact is updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contact.index')->with('status', 'contact is deleted');
    }
}
