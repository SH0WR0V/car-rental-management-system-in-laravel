<?php

namespace App\Http\Controllers\Admin;
use DateTime;
use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class NoticeController extends Controller
{
    public function notice_view(Request $request)
    {
        $n=Notice::all();
        return $n;
    }
    public function notice_delete(Request $req)
    {
        $n=Notice::where('id','=',($req->id))->first();
        $res = $n->delete();

        if($res){
            return 'Your Notice Post Delete successfully';
        }else{
            return 'Something Went Wrong';
        }
    }
    public function notice_edit_view(Request $req)
    {
        $n=Notice::where('id','=',($req->id))->first();
        return $n;
    }
    public function notice_edit(Request $req)
    {
        $n=Notice::where('id','=',($req->id))->first();
        $n->notice_date= $req->notice_date;
        $n->notice=$req->notice;
        $res = $n->save();

        if($res){
            return 'Your Notice Post Update successfully';
        }else{
            return 'Something Went Wrong';
        }
    }
    public function admin_add_notice(Request $request)
    {
        $request->validate([
            'notice'=>'required',
        ]);

        $n=new Notice();
        $n->notice_date=new DateTime(today());
        $n->notice=$request->notice;
        $res = $n->save();

        if($res){
            return 'You have Notice Post successfully';
        }else{
            return 'Something Went Wrong';
        }
    }
}
