<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class TrashApiController extends Controller
{
    public function index(){
        // Get all temporarily deleted Data . . . . .
        $contacts = Contact::onlyTrashed()->get();
        return ContactResource::collection($contacts);
    }

    public function forceDelete($id){
        Contact::onlyTrashed()->findOrFail($id)->forceDelete();
        return response()->json(['message' => 'contact is deleted', 'status' => 204], 204);
    }

    public function forceDeletes(Request $request){
        Contact::onlyTrashed()->whereIn('id', $request->contacts)->forceDelete();
        return response()->json(['message' => 'contact are deleted', 'status' => 204], 204);
    }

    public function restore($id){
        // Recover Deleted Data . . . . .
        $contact = Contact::withTrashed()->findOrFail($id)->restore();
        return response()->json(['message' => 'contact is restored', 'status' => 200], 200);
    }

    public function restores(Request $request){
        // Recover Deleted Data . . . . .
        $contact = Contact::withTrashed()->whereIn('id', $request->contacts)->restore();
        return response()->json(['message' => 'contact are restored', 'status' => 200], 200);
    }

}
