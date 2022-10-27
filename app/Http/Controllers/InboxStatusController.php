<?php

namespace App\Http\Controllers;

use App\Models\Send;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InboxStatusController extends Controller
{
    public function multipleSend(Request $request){
        foreach ($request->contacts as $contact) {
            $send = new Send();
            $send->from = Auth::user()->email;
            $send->to = $request->to;
            $send->contact_id = $contact;
            $send->save();
       }
        return redirect()->back()->with('status', 'sending contacts');
    }

}
