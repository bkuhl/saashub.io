<?php namespace SaaSHub\Http\Controllers;

use Config;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Session;

class ContactController extends Controller
{
    use ValidatesRequests;

    /**
     * @return \Illuminate\View\View
     */
    public function getContact()
    {
        return view('contact');
    }

    /**
     * @return mixed
     */
    public function postContact(Request $request, Mailer $mailer)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
            'message'   => 'required'
        ]);

        $mailer->send('emails.contact', ['body' => $request->get('message')], function($message) use($request)
        {
            $message->from($request->get('email'), $request->get('name'));
            $message->to(Config::get('saashub.contact'), 'Free Tier')->subject('FreeTier Inquiry');
        });

        Session::flash('success', "Thanks!  We'll be in touch shortly");

        return redirect('/contact');
    }
}
