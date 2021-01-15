<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(2);
        return view('contact.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::find($id);

        if (!$contact)
            return redirect()->back();

        return view('contact.show', compact('contact'));
    }
}
