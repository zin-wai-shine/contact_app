<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSendRequest;
use App\Http\Requests\UpdateSendRequest;
use App\Models\Contact;
use App\Models\Send;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sends = Send::where('to', Auth::user()->email)->get();
        return view('inbox.index', compact('sends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSendRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSendRequest $request)
    {
        /*$contact = Contact::find($request->id);*/
        $send = new Send();
        $send->from = Auth::user()->email;
        $send->to = $request->to;
        $send->contact_id = $request->id;
        $send->save();

        return redirect()->back()->with('status', 'sending contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Send  $send
     * @return \Illuminate\Http\Response
     */
    public function show(Send $send)
    {
        $id = $send->contact_id;
        $contact = Contact::find($id);
        return view('inbox.show', compact(['contact','send']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Send  $send
     * @return \Illuminate\Http\Response
     */
    public function edit(Send $send)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSendRequest  $request
     * @param  \App\Models\Send  $send
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSendRequest $request, Send $send)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Send  $send
     * @return \Illuminate\Http\Response
     */
    public function destroy(Send $send)
    {
        $send->delete();
        return redirect()->back()->with('status', 'Dimissed');
    }
}
