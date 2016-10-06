<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Mail;

class MailController extends Controller
{
    public function index()
    {
        return view('mail.index');
    }

    public function send(Request $request)
    {
        Mail::send('emails.sendgrid_sample', [], function (Message $message) use ($request) {
            $message->subject('This is a test.');
            $message->to('ichikawa.shingo.0829@gmail.com');
            if ($request->hasFile('attachments')) {
                foreach ($request->files as $attachment) {
                    $message->attach($attachment->getRealPath(), ['Vorbereitungsunterlage', 'application/pdf']);
                }
            }
        });
        return 'OK';
    }

}
