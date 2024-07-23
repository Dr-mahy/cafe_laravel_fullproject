<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Category;
use App\Models\Beverage;
use App\Models\Specialitem;
use App\Models\Contact;
use App\Mail\ContactsMail;

class WavecafeController extends Controller
{
    public function wavecafe(){
        $categories=Category::take(3)->get();
        $specialitems=Specialitem::get();
        $beverages=Beverage::get();
        return view('wavecafe',compact('categories','beverages','specialitems'));
    }
    
  /**
     * Show the form for creating a new contact us.
     */
    public function create()
    {
        $categories=Category::take(3)->get();
        $specialitems=Specialitem::get();
        $beverages=Beverage::get();
        return view('wavecafe');
    }
    /**
     * Store a newly created resource in contacts table.
     */
    public function store(Request $request)
    {
        $messages=$this->errMsg();
       $data=$request->validate([
        'name'=>'required|max:100|min:3',
        'email'=>'required|unique:users|email',
        'message' => 'required',
       ],$messages
    );
       Contact::create($data);
       return redirect('wavecafe')->with('success','message sent successfully');


    
    }
    // send email to mailhog from the contact us form
       public function mailfromcontact(){
        $data=Contact::findOrFail(1)->toArray();
        $data['theMessage']=$data['message'];
       Mail::to($data['email'])->send(
        new ContactsMail($data)
       );
        return "mail sent";
        }

        public function errMsg(){
            return[
                'name.required'=>'the client name is required,please insert the name',
                'message.min'=>'the name is short,the name must be more than 5 letters',
                'email.unique'=>'unique',
            ];
        }
}
