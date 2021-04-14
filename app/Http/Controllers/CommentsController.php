<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Reaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->paginate(5);
        Paginator::useBootstrap();

       return view('comments',['comments'=>$comments]);
    }
      

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $comment = new Comment;
       return redirect('comments');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
 {
        // Podstawowa walidacja formularza:
 $this->validate($request, [
 'message' => 'required|min:10|max:255',
 ]);
    if(\Auth::user()==null){
            return view('home');
    }
    $comment = new Comment();
    $comment->user_id = \Auth::user()->id;
    $comment->message = $request->message;
    if($comment->save()){
        return redirect('comments');
    }
    return redirect('comments');
 
}




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function edit($id) {
 $comment = Comment::find($id);
 //Sprawdzenie czy użytkownik jest autorem komentarza
 if (\Auth::user()->id != $comment->user_id) {
 return back()->with(['success' => false, 'message_type' => 'danger',
 'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
 }
 return view('commentsEditForm', ['comment'=>$comment]);
 }
 
 
 
 public function update(Request $request, $id)
 { 
     $comment = Comment::find($id);
 //Sprawdzenie czy użytkownik jest autorem komentarza
 if(\Auth::user()->id != $comment->user_id)
 {
 return back()->with(['success' => false, 'message_type' => 'danger',
 'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
 }
 $comment->message = $request->message;
 if($comment->save()) {
 return redirect()->route('comments');
 }
 return "Wystąpił błąd.";
 }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
//Znajdź komentarz o danych id:
 $comment = Comment::find($id);
 //Sprawdz czy użytkownik jest autorem komentarza:
 if(\Auth::user()->id != $comment->user_id && \Auth::user()->admin==false)
 {
 return back();
 }
 if($comment->delete()){
 return redirect()->route('comments');
 }
 else return back();
}


public function dislike($id)
{
   
    $uid=\Auth::user()->id;
    $comment = Comment::find($id);
    $cid=$comment->id;
//dd(Reaction::where('user_id',4)->get());
    
    if(Reaction::where('user_id',$uid)->where('comment_id',$cid)->first()==null){
         
         $reaction = new Reaction;
    
    $pom=$comment->dislikes;
    $pom++;
    $comment->dislikes=$pom;
    $comment->save();
    $reaction->user_id = \Auth::user()->id;
    $reaction->comment_id = $comment->id;
    $reaction->save();
}
    
        
    return redirect()->route('comments');
}



public function publish($text)
    {
       $this->validate($request, [
 'message' => 'required|min:10|max:255',
 ]);
    if(\Auth::user()==null){
            return view('home');
    }
    $comment = new Comment();
    $comment->user_id = \Auth::user()->id;
    $comment->message = $request->text;
    if($comment->save()){
        return redirect('comments');
    }
    return redirect('comments');
    }
}