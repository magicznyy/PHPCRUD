<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
class ImageUploadController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = \Auth::user()->id.".jpg";  
     
        $request->image->move(public_path('images'), $imageName);
  
        /* Store $imageName name in DATABASE from HERE */
        $user = \Auth::user();
        
        
        return redirect()->route('profile');
    
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName); 
    }
}


 