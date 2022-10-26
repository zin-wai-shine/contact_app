<?php

namespace App\Http\Controllers;

use App\Exports\ContactExport;
use App\Exports\SingleExport;
use App\Imports\ContactImport;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MoreStatusApiController extends Controller
{
    public function multipleDelete(Request $request){
        $contacts = Contact::destroy($request->contacts);
        return response()->json(['message'=>'contact are deleted', 'status' => 204, 'contact' => $contacts],204);
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
            $newContact->save();
        }
        return response()->json(['message'=>'contacts are copied', 'status' => 200, 'contact' => $newContact],200);
    }

    public function copy($id){
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
        $newContact->user_id = 2;
        $newContact->save();
        return response()->json(['message'=>'contact is copied', 'status' => 200, 'contact' => $newContact],200);
    }

    public function export()
    {
        $exports = Excel::download(new ContactExport(), 'contacts.csv');
        return response()->json(['message' => 'contact is exported', $exports ,'status'=>200], 200);
    }

    public function singleExport($id){
        $export = Excel::download(new SingleExport($id), 'contact.csv');
        return response()->json(['message' => 'contact is exported', $export ,'status'=>200], 200);
    }

    public function import(Request $request){
        $request->validate([
            'csv_file' => 'required|mimes:csv'
        ]);
        $contact = Excel::import(new ContactImport, $request->file('csv_file'));
        return redirect()->json(['message' => 'contact is imported', $contact, 'status' => 200], 200);
    }
}
