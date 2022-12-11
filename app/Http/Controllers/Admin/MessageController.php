<?php

namespace App\Http\Controllers\Admin;
use DateTime;
use App\Http\Controllers\Controller;
use App\Models\RentMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message_view(Request $request)
    {
        $receiver=$request->id;
        $message=RentMessage::where('sender','=',$request->id,'AND','receiver','=',$request->session()->get('UserID'))->orwhere('receiver','=',$request->id,'AND','sender','=',$request->session()->get('UserID'))->get();
        return view('Admin_Pages.message_view')->with("m",$message)->with("r",$receiver);
        //return $message;
    }


    public function send_message(Request $request)
    {
        $message= new RentMessage();
        $message->sender=$request->session()->get('UserID');
        $message->receiver=$request->receiver;
        $message->m_date=new DateTime(today());
        $message->m_text=$request->text;
        $message->save();
        return back();
        //return $message;
    }
}
