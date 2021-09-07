<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;

class CommentAdController extends Controller
{
    //
    public function index()
    {

        $sample_comments = DB::table('comments')
            ->join('samples','comments.sample_id','=','samples.id')
            ->join('users','users.id','=','comments.user_id')
            ->where('comments.approved','=',0)
            ->select('comments.id','samples.title','users.user_name','comments.description')->get();

        return view('admin.comment_management.index');
    }

    public function getSampleComments()
    {
        $sample_comments = DB::table('comments')
            ->join('samples','comments.sample_id','=','samples.id')
            ->join('users','users.id','=','comments.user_id')
            ->where('comments.approved','=',0)
            ->select('comments.id','samples.title','users.user_name','comments.description')->get();

       return  response()->json(['sample_comments'=>$sample_comments]);
    }

    public function getTipsComments()
    {

    }
    public function getCreativesComments()
    {

    }

    public function getCoursesComments()
    {

    }

    public function confirmComment(Request $request)
    {


    }

    public function deleteComment(Request $request)
    {

    }


}
