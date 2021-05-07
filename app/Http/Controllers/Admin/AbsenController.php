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
        $user = Auth::user();        
        // $pembimbing = User::all();
        // if ( $user->role == "Instruktur UPD") {
        //     $ekskul_id = $user->upd_id;
        //     // dd($user);  
        // }else if ($user->role == "Guru Senbud") {
        //     $ekskul_id = $user->senbud_id;
        // }else{
        //     $ekskul_id = $user->updprod_id;
        // }
        $absenUser = Absen::query()
            ->join('ekskul', 'ekskul.id', '=', 'absen.eskul_id' )
            ->join('users', 'users.id', '=', 'absen.user_id' )
            ->select(   
                'absen.user_id as users_id',
                'absen.eskul_id as ekskul_id',
                'ekskul.name as ekskul_name',
                'users.name as user_name',
                'absen.date',
            )
            ->where('absen.user_id','=',$user->id)
            ->paginate(5);
            
        
        return view('Admin.absen.index',compact('absenUser'))
            ->with('i', (request()->input('page', 1) -1)*5);
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
        // dd($user);
        if ( $user->role == "Instruktur UPD") {
            $ekskul_id = $user->upd_id;
            // dd($user);  
        }else if ($user->role == "Guru Senbud") {
            $ekskul_id = $user->senbud_id;
        }else{
            $ekskul_id = $user->updprod_id;
        }
             
        $data = [
            'date' => $dataRequest['date'],
            'user_id' => $user->id,
            'eskul_id' => $ekskul_id,
        ];                
        $absen = Absen::create($data);
        
        return redirect(route('absen.index', $absen->id))
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
    public function show($id)
    {
        
    }
}