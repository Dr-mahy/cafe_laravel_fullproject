<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialitem;
use App\Models\Contact;
use Carbon\Carbon;
class AdminController extends BaseController
{
    public function index(){
        Parent::__construct();
        $this->setTitle('specialItems');
        $allmessages=Contact::get();
        $specialitems=Specialitem::get();
        return view('specialitems',compact('specialitems','allmessages'));
    }
   
      /**
     * Display a listing of the messages.
     */
    public function messages()
    {
        Parent::__construct();
        $this->setTitle('messages');
        $unreadmessages=Contact::where('read',false)->get();
        $allmessages=Contact::all();
        // $message=Contact::find(1);
        // // get the current time
        // $now=Carbon::now();
        // $timeelapsed=$message->created_at->diffForHumans($now);
        return view('messages',compact('unreadmessages','allmessages'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Parent::__construct();
        $this->setTitle('show message');
        $unreadmessages=Contact::where('read',false)->get();
        $allmessages=Contact::get();
        $message=Contact::FindOrFail($id);
        if($message){
            $message->read=true;
            $message->save();
            return view ('showmessage',compact('message','unreadmessages','allmessages'))->with('status','message marked as read');
        }
        return view ('showmessage',compact('message','unreadmessages','allmessages'))->with('status','message not found');
    }
     /**
     * Remove the specified resource from messages.
     */
    public function destroymessage(Request $request)
    {
        $id=$request->id;
        Contact::where('id',$id)->delete();
        return redirect('admin/messages')->with('success','beverage deleted successfully');
    }


}
