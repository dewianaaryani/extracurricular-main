<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    
    public function index(){                
        $content = Content::find(1);
        return view('Admin/content/form-edit',compact('content'));        
    }
    public function save(Request $request){
        $request->validate([
            'home_desc'=>'required',            
            'about_desc'=>'required',            
            'contact_desc'=>'required',            
            'ekskul_desc'=>'required',            
            'senbud_desc'=>'required',            
            'upd_desc'=>'required',            
            'updprod_desc'=>'required',                                
        ]);
        $dataRequest = $request->all();
        $data = [
            'home_desc' => $dataRequest['home_desc'],
            'about_desc' => $dataRequest['about_desc'],
            'contact_desc' => $dataRequest['contact_desc'],
            'ekskul_desc' => $dataRequest['ekskul_desc'],
            'senbud_desc' => $dataRequest['senbud_desc'],
            'upd_desc' => $dataRequest['upd_desc'],
            'updprod_desc' => $dataRequest['updprod_desc'],            
        ];
        Content::find(1)->update($data);
        return redirect()->route('admin.form.content')
            ->with('success','Successed Update data');
    }

}

