<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CopyController extends Controller
{
    public function singleCopy($id){

        $contact = Contact::find($id);
            $newContact = new Contact();
            $newContact->first_name = $contact->first_name;
            $newContact->last_name = $contact->last_name;
            $newContact->featured_img = $contact->featured_img;
            $newContact->company = $contact->company;
            $newContact->job_title = $contact->job_title;
            $newContact->email = $contact->email;
            $newContact->phone = $contact->phone;
            $newContact->birthday = $contact->birthday;
            $newContact->note = $contact->note;
            $newContact->user_Id = Auth::id();
            $newContact->save();
        return redirect()->route('contact.index')->with('status' ,'copied');
    }

    public function multipleCopy(Request $request){
        foreach ($request->contacts as $contact){
            $getContact = Contact::find($contact);
            $newContact = new Contact();
            $newContact->first_name = $getContact->first_name;
            $newContact->last_name = $getContact->last_name;
            $newContact->featured_img = $getContact->featured_img;
            $newContact->company = $getContact->company;
            $newContact->job_title = $getContact->job_title;
            $newContact->email = $getContact->email;
            $newContact->phone = $getContact->phone;
            $newContact->birthday = $getContact->birthday;
            $newContact->note = $getContact->note;
            $newContact->user_Id = Auth::id();
            $newContact->save();
        }
        return redirect()->back()->with('status' , 'copied');
    }
}
