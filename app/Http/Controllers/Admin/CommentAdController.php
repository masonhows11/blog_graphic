<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
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
        $comments = DB::table('comments')
            ->join('samples','comments.sample_id','=','samples.id')
            ->join('users','users.id','=','comments.user_id')
            ->where('comments.approved','=',0)
            ->select('comments.id','samples.title','users.user_name','comments.description')->get();

       return  response()->json($comments);
    }

    public function getCreativesComments()
    {
        $comments = DB::table('comments')
            ->join('creatives','comments.creative_id','=','creatives.id')
            ->join('users','users.id','=','comments.user_id')
            ->where('comments.approved','=',0)
            ->select('comments.id','creatives.title','users.user_name','comments.description')->get();

        return  response()->json($comments);
    }

      public function getTipsComments()
       {
           $comments = DB::table('comments')
               ->join('tips','comments.tip_id','=','tips.id')
               ->join('users','users.id','=','comments.user_id')
               ->where('comments.approved','=',0)
               ->select('comments.id','tips.title','users.user_name','comments.description')->get();

           return  response()->json($comments);
       }
       /**/


   public function getCoursesComments()
    {
       $comments = DB::table('comments')
            ->join('courses','comments.course_id','=','courses.id')
            ->join('users','users.id','=','comments.user_id')
            ->where('comments.approved','=',0)
            ->select('comments.id','courses.title','users.user_name','comments.description')->get();

        return  response()->json($comments);
    }


    public function confirmComment(Request $request)
    {

        $comment = Comment::findOrFail($request->comment_id);
        if(!$comment)
        {
            return response()->json(['error'=>'دیدگاه مورد نظر پیدا نشد.']);
        }
        if($comment->approved === 0)
        {
                $comment->approved = 1;
                $comment->save();
        }
        return response()->json(['success'=>'دیدگاه مورد نظر تایید شد.','status'=>200]);

    }

    public function deleteComment(Request $request)
    {
        $comment = Comment::findOrFail($request->comment_id);
        if(!$comment)
        {
            return response()->json(['error'=>'دیدگاه مورد نظر پیدا نشد.']);
        }
        Comment::destroy($request->comment_id);
        return response()->json(['success'=>'دیدگاه مورد نظر حذف شد.','status'=>200]);

    }


}
