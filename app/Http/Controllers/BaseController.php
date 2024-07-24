<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;

class BaseController extends Controller
{
   protected $title;
   
   public function __construct(){

    view()->share('title',$this->title);
    $this->sharemessages();
    $this->sharetimeelapsed();
    $this->shareunreadmessages();

   }
//    logic for timeelapsed from sending a message
   protected function sharetimeelapsed(){
        $message=Contact::latest()->first();
        $timeelapsed=$message?$message->created_at->diffForHumans(Carbon::now()):"no messages";
        view()->share('timeelapsed',$timeelapsed);
   }
//    the unreaded messages in all admin views
   protected function shareunreadmessages(){
    $unreadmessages=Contact::where('read',false)->get();
    view()->share('unreadmessages',$unreadmessages);
}
protected function sharemessages(){
    $allmessages=Contact::get();
    view()->share('allmessages',$allmessages);
}
// _____function to pass the $title to all pages as adynamic variable
protected function settitle($title){
   $this->title=$title;
   view()->share('title',$this->title);
}
}
