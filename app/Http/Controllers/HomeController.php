<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Owner;
class HomeController extends BaseController
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
        $title="home";
        $owners=Owner::get();
        $unreadmessages=Contact::where('read',false)->get();
        $allmessages=Contact::get();
        return view('users',compact('allmessages','unreadmessages','owners','title'));
    }
}
