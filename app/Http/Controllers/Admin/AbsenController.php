<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\User;
use App\Models\Ekskul;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */


    public function index()
    {   
        $ekskul = Ekskul::all();
        $user = User::all();

        if($user)
        
        // $absen = Absen::latest()->paginate(5);
        // return view('Admin.absen.index',compact('absen'))
        //     ->with('i', (request()->input('page', 1) -1)*5);
    }
    public function create()
    {
        return view('Admin.absen.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'date'=>'required',
            
        ]);
        $dataRequest = $request->all();
        $user = Auth::user();
        $data = [
            'date' => $dataRequest['date'],
            'eskul_id' => $user->eksul_id
        ];
        
        if(!empty($dataRequest['image_1'])){
            $imageName = date('ymdhis').'_image_1.'.$request->image_1->extension();
            $request->image_1->move(public_path('images/upd'), $imageName);
            $data['image_1'] = $imageName;
        }
        if(!empty($dataRequest['image_2'])){
            $imageName = date('ymdhis').'_image_2.'.$request->image_2->extension();  
            $request->image_2->move(public_path('images/upd'), $imageName);
            $data['image_2'] = $imageName;
        }
        if(!empty($dataRequest['image_3'])){
            $imageName = date('ymdhis').'_image_3.'.$request->image_3->extension();  
            $request->image_3->move(public_path('images/upd'), $imageName);
            $data['image_3'] = $imageName;
        }
        Ekskul::create($data);
        
        return redirect()->route('upd.index')
            ->with('success', 'Success Added Data');

    }

    public function edit($id)
    {
        $upd = Ekskul::find($id);
        return view('Admin.upd.update', compact('upd'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $dataRequest = $request->all();
        $data = [
        
            'name' => $dataRequest['name'],
            'tempat' => $dataRequest['tempat'],
            'type' => "Upd",
            'description' => $dataRequest['description'],
            'hari' => $dataRequest['hari'],
            'jam' => $dataRequest['jam'],    
        
        ];
        if(!empty($dataRequest['image_1'])){
            $imageName = date('ymdhis').'_image_1.'.$request->image_1->extension();
            $request->image_1->move(public_path('images/upd'), $imageName);
            $data['image_1'] = $imageName;
        }
        if(!empty($dataRequest['image_2'])){
            $imageName = date('ymdhis').'_image_2.'.$request->image_2->extension();  
            $request->image_2->move(public_path('images/upd'), $imageName);
            $data['image_2'] = $imageName;
        }
        if(!empty($dataRequest['image_3'])){
            $imageName = date('ymdhis').'_image_3.'.$request->image_3->extension();  
            $request->image_3->move(public_path('images/upd'), $imageName);
            $data['image_3'] = $imageName;
        }
        Ekskul::find($id)->update($data);
        return redirect()->route('upd.index')
            ->with('success','Success Update Data');
    }
    public function destroy($id)
    {
        Ekskul::find($id)->delete();
        return redirect()->route('upd.index')
            ->with('success', 'Success Delete Data');
    }
}