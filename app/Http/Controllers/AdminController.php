<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialitem;
use App\Models\Contact;
class AdminController extends Controller
{
    public function index(){
        $allmessages=Contact::get();
        $specialitems=Specialitem::get();
        return view('specialitems',compact('specialitems','allmessages'));
    }
   
      /**
     * Display a listing of the messages.
     */
    public function messages()
    {

        $unreadmessages=Contact::where('read',false)->get();
        $allmessages=Contact::all();
        return view('messages',compact('unreadmessages','allmessages'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
