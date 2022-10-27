<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Send;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecieveController extends Controller
{
    public function recieve(Request $request){

        $data = Contact::find($request->contact_id);
        $contact = new Contact();
        $contact->first_name = $data->first_name;
        $contact->last_name = $data->last_name;
        if($data->featured_img){
            $contact->featured_img = $data->featured_img;
        }
        if($data->company){
            $contact->company = $data->company;
        }
        if($data->jobTitle){
            $contact->job_title = $data->jobTitle;
        }
        if($data->email){
            $contact->email = $data->email;
        }
        $contact->phone = $data->phone;
        if($data->birthday){
            $contact->birthday = $data->birthday;
        }
        if($data->note){
            $contact->note = $data->note;
        }
        $contact->user_id = Auth::user()->id;
        $contact->save();

        Send::find($request->send_id)->delete();
        return redirect()->route('contact.index')->with("status", "recieved");
    }
}
