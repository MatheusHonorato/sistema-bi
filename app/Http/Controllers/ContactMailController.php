<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $mailData = [
            'name' => $request->name,
            'body' => 'This is for testing email using smtp.'
        ];

        Mail::to('matheuspaixaohonorato@gmail.com')->send(new ContactMail($mailData));

        return redirect('/')->with('success-mail', 'Sua mensagem foi enviada com sucesso!')->with('details', 'Um dos nossos nosso analistas manterá contato.')->with('thanks', 'Agradecemos pela atenção.');
    }
}
