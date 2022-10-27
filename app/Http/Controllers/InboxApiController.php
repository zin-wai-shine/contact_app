<?php

namespace App\Http\Controllers;

use App\Http\Resources\InboxResource;
use App\Models\Contact;
use App\Models\Send;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InboxApiController extends Controller
{
    public function inbox()
    {
        $sends = Send::where('to', Auth::user()->email)->get();
        return InboxResource::collection($sends);
    }

    public function send(Request $request){
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
        return response()->json($contact);
    }

    public function multipleSend(Request $request){
        foreach ($request->contacts as $contact) {
            $send = new Send();
            $send->from = Auth::user()->email;
            $send->to = $request->to;
            $send->contact_id = $contact;
            $send->save();
        }
        return response()->json(['message'=>'were send'], 200);
    }

    public function dimiss($id){
        $contact = Send::find($id)->delete();
        return response()->json(['message' => 'contact are not found','status' => 204], 204);
    }
}
