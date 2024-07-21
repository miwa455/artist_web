<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Artist\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactRequest $request)
    {
        $contact = new Contact;
        $contact->created_name = $request->name();
        $contact->email = $request->email();
        $contact->message = $request->message();
        $contact->save();
        return redirect()
                ->route('artist.contact');
    }
}
