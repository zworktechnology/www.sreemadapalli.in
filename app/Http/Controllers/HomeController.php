<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function contact(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        $name = $request->get('name');
        $email = $request->get('email');
        $message = $request->get('message');

        $template = 'Hi%20M/s20%Sree%20Madapalli%20-%20Admin%0A%0ANew%20contact%20request%20has%20submitted%20with%20the%20following%20information%0A%0A*Name*%20:%20' . $name . '%0A*Phone%20Number*%20:%20' . $clinet_phone . '%0A*Email*%20:%20' . $email . '%0A*Service*%20:%20' . $service . '%0A*Message*%20:%20' . $message . '%0A%0AGood luck!';


        $access_token_key = '6846b47c20fee';
        $instance_id_key = '6846B62860B93';

        $response = http::post('https://mtechlivedemo.com/api/send?number=9174021825236&type=text&message=' . $template . '&instance_id=' . $instance_id_key . '&access_token=' . $access_token_key . '');
        //dd($response);
        if ($response->successful()) {
            return redirect()->route('thankyou')->with('success', 'Message sent successfully!');
        } else {
            return redirect()->route('contact');
        }
    }
}
