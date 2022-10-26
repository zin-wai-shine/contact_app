<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
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
        $contact = Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id' => 2,
        ]);
        if($request->file('featured_img')){
            $newName = $request->file('featured_img')->store("public/featuredImg");
            $contact->featured_img = $newName;
        }
        return response()->json(['message' => 'contact is created','contact'=>$contact ,'status'=>200]);

    }


    public function show($id)
    {
        $contact = Contact::find($id);
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
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
          if($request->file('featured_img')){
              $newName = $request->file('featured_img')->store("public/featuredImg");
              $contact->featured_img = $newName;
          }
        $contact->update();
        return response()->json(['message'=>'contact is updated', 'contact' => $contact, 'status' => 200], 200);
    }


    public function destroy($id)
    {
        $contact = Contact::all()->find($id)->delete();
        return response()->json(['message' => 'contact is deleted', 'status'=>204], 204);
    }
}
