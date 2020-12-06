<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('fileUpload');
    }
  
    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlsx,csv,jpeg,jpg,png|max:8388608',
        ]);
  
        $fileName = $request->file->getClientOriginalName();

        $request->file->move(storage_path('uploadedFile'), $fileName);
   
        return back()
            ->with('success','You have successfully upload file.')
            ->with('file',$fileName);
   
    }
}