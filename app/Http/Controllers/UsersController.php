<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;

class UsersController extends Controller
{
     public function delete_user($id)
    {
        
     $comments = Comment::orderBy('created_at', 'asc')->get();
         
     
         $user=User::find($id);
          
                        
         $user->delete();
         
         
           return redirect()->route('reports');
    }
    
    
    
public function edit_name() {

 return view('nameEditForm');
 }
  
 
  public function update(Request $request, $id)
 { 
     $user = \Auth::user();
 //Sprawdzenie czy użytkownik jest autorem komentarza

 $user->name = $request->message;
 if($user->save()) {
 return redirect()->route('comments');
 }
 return "Wystąpił błąd.";
 }
 
  public function update2(Request $request, $id)
 { 
     $user = \Auth::user();
 //Sprawdzenie czy użytkownik jest autorem komentarza

 $user->name = $request->message;
 if($user->save()) {
 return redirect()->route('comments');
 }
 return "Wystąpił błąd.";
 }
 
 

}