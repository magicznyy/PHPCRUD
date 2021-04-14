<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;


class ReportsController extends Controller
{
    
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'asc')->get();
         return view('reports',['comments'=>$comments]);
    }
    
     public function report($id)
    {
         $comment = Comment::find($id);
         $pom=$comment->reports;
         
         $pom++;
       
         $comment->reports = $pom;
         $comment->save();
          $comments = Comment::orderBy('created_at', 'asc')->get();
           
           return redirect('comments');
    }
    
}
