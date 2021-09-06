<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentAdController extends Controller
{
    //
    public function index()
    {

        $sample_comments = DB::table('comments')
            ->join('samples','comments.sample_id','=','samples.id')
            ->join('users','users.id','=','comments.user_id')
            ->select('comments.id','samples.title','users.user_name','comments.description')->get();
       // return  $sample_comments;


        return view('admin.comment_management.index');
    }

    public function getSampleComments()
    {
        $sample_comments = DB::table('comments')
            ->join('samples','comments.sample_id','=','samples.id')
            ->join('users','users.id','=','comments.user_id')
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



}
