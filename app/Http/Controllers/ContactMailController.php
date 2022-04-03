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
            'identificacao' => $request->identificacao,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'state' => $request->state,
            'city' => $request->city,
            'descricao' => $request->descricao
        ];

        Mail::to('contato@rebrax.com')->send(new ContactMail($mailData));

        return redirect('/')->with('success-mail', 'Sua mensagem foi enviada com sucesso!')->with('details', 'Um dos nossos nosso analistas manterá contato.')->with('thanks', 'Agradecemos pela atenção.');
    }
}
