<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsDeleteController extends Controller
{
    public function multipleDelete(Request $request){
        Contact::destroy($request->contacts);
        return redirect()->back();
    }
}
