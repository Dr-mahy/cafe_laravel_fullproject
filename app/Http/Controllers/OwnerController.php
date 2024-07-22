<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Contact;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unreadmessages=Contact::where('read',false)->get();
        $allmessages=Contact::get();
        $owners=Owner::get();
        return view('users',compact('owners','allmessages','unreadmessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unreadmessages=Contact::where('read',false)->get();
        $allmessages=Contact::get();
        return view('adduser',compact('allmessages','unreadmessages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages=$this->errMsg();
        $data=$request->validate([
            'fullname' => 'required|min:3',
            'username'=>'required|min:2',
            'email'=>'required',
            'password'=>'required|min:5',
            ],$messages
        );
            $data['active']=isset($request->active);
            Owner::create($data);
            return redirect('admin/users')->with('success','user added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unreadmessages=Contact::where('read',false)->get();
        $allmessages=Contact::get();
        $owner=Owner::FindOrFail($id);
        return view ('showuser',compact('owner','unreadmessages','allmessages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unreadmessages=Contact::where('read',false)->get();
        $allmessages=Contact::get();
        $owner=Owner::FindOrFail($id);
        return view ('edituser',compact('owner','unreadmessages','allmessages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message=$this->errMsg();
        $data=$request->validate([
            'fullname' => 'required|min:2',
            'username'=>'required',
            'email'=>'required',
            'password'=>'required|min:5',
            ],$message
        );
            $data['active']=isset($request->active);
            
            Owner::where('id',$id)->update($data);
            return redirect('admin/users')->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        Owner::where('id',$id)->delete();
        return redirect('admin/users');
    }
     // trash
     public function trash()
     { 
        $unreadmessages=Contact::where('read',false)->get();
        $allmessages=Contact::get();
       $trashed=Owner::onlyTrashed()->get();
       return view('trashedusers',compact('trashed','allmessages','unreadmessages'));
     }
     // restore trashed
     public function restore(string $id)
     {
        Owner::where('id',$id)->restore();
         return redirect('admin/users');
     }
 // forcedelete
     public function forcedelete(Request $request)
     {
        $id=$request->id;
        Owner::where('id',$id)->forcedelete();
         return redirect('admin/trashedusers');
     }
     public function errMsg(){
        return[
            'fullname.required'=>'the client name is required,please insert the name',
            'fullname.min'=>'the name is short,the name must be more than 5 letters',
            'password.min'=>'password must be more than 5 digits',
            'email.unique'=>'unique',
        ];
    }
}
