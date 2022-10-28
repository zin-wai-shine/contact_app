<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactApiController extends Controller
{

    public function index()
    {
        $contacts = Contact::latest('id')->paginate(10);
        return ContactResource::collection($contacts);
    }


    public function store(Request $request)
    {
        $request->validate([
           'first_name' => 'required|min:2|max:7',
           'last_name' => 'required|min:2|max:15',
           'email' => 'email',
           'phone' => 'numeric'
        ]);
        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;

        if($request->hasFile('featured_img')){
            $newName = $request->file('featured_img')->store("public/featuredImg");
            $contact->featured_img = $newName;
        }

        if($request->company){
            $contact->company = $request->company;
        }
        if($request->job_title){
            $contact->job_title = $request->job_title;
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
        return response()->json(['message' => 'contact is created','contact'=>new ContactResource($contact) ,'status'=>200]);

    }


    public function show($id)
    {
        $contact = Contact::find($id);
        if(is_null($contact)){
            return response()->json(["message" => "Contact Not Found"], 404);
        }
        return new ContactResource($contact);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|min:2|max:7',
            'last_name' => 'required|min:2|max:15',
            'email' => 'email',
            'phone' => 'numeric'
        ]);
        $contact = Contact::all()->find($id);
        if(is_null($contact)){
            return response()->json(["message" => "Contact Not Found"], 404);
        }
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
          if($request->file('featured_img')){
              $newName = $request->file('featured_img')->store("public/featuredImg");
              $contact->featured_img = $newName;
          }

        if($request->company){
            $contact->company = $request->company;
        }
        if($request->job_title){
            $contact->job_title = $request->job_title;
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
        return response()->json(['message'=>'contact is updated', 'contact' => $contact, 'status' => 200], 200);
    }


    public function destroy($id)
    {
        $contact = Contact::all()->find($id);
        if(is_null($contact)){
            return response()->json(["message" => "Contact Not Found"], 404);
        }
        $contact->delete();
        return response()->json(['message' => 'contact is deleted', 'status'=>204], 204);
    }
}
