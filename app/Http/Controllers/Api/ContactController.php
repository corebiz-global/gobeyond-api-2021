<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::select();

        if ($request->has('name')) {
            $contacts->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        return $contacts->paginate(15);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string',
            'message' => 'required|string|min:20',
            'authorize_receiving_emails' => 'boolean'
        ], [
            'subject.required' => 'Campo obrigatório',
        ]);

        if ($validation->fails())
            return response()->json(['errors' => $validation->errors()], 422);

        $contact = Contact::create(
            $request->only([
                'name',
                'email',
                'subject',
                'message',
                'authorize_receiving_emails'
            ])
        );

        return response($contact, 201);
    }
}
