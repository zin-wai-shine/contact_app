<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ForceDeleteController extends Controller
{
    public function index(){
        // Get all temporarily deleted Data . . . . .
        $contacts = Contact::onlyTrashed()->get();
        $colors = ['#c94cbe', '#016612', '#ffa010',' #660077', '#d72323', '#1e2a78', '#ea7dc7'];
        return view('contact.trash', compact('contacts', 'colors'));
    }

    public function forceDelete($id){
        // If Temporarily Deleted use normal delete.
        // Really Deleted . . . . .
        Contact::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->back()->with('status', 'contact was deleted');
    }

    public function forceDeletes(Request $request){
        Contact::onlyTrashed()->whereIn('id', $request->contacts)->forceDelete();
        return redirect()->back()->with('status', 'contact were deleted');
    }

    public function restore($id){
        // Recover Deleted Data . . . . .
        Contact::withTrashed()->findOrFail($id)->restore();
        return redirect()->back()->with('status', 'contact was recover');
    }

    public function restores(Request $request){
        // Recover Deleted Data . . . . .
        Contact::withTrashed()->whereIn('id', $request->contacts)->restore();
        return redirect()->back()->with('status', 'contact were recover');
    }



}
