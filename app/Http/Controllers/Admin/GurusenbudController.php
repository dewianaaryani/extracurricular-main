<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ekskul;

class GurusenbudController extends Controller
{
    public function index()
    {
        $gurusenbud = User::where('role','=','Guru Senbud')
        ->join('ekskul as senbud','senbud.id','=','users.senbud_id')        
        ->select(   'users.id as id', 
                    'users.nomor_induk', 
                    'users.name',
                    'users.username',
                    'users.password', 
                    'senbud.name as senbud_name')
        ->get();
        // dd($gurusenbud);
        return view('Admin.gurusenbud.index',compact('gurusenbud'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }
    public function create(){        
        $senbud = Ekskul::where('type','=','Senbud')->get();
        return view('Admin.gurusenbud.create',compact('senbud'));        
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'senbud_id'=>'required',
            'username'=>'required',
            'password'=>'required',                        
        ]);
        $dataRequest = $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'nomor_induk' => $dataRequest['nomor_induk'],
            'role' => "Guru Senbud",    
            'senbud_id' => $dataRequest['senbud_id'],            
            'username' => $dataRequest['username'],
            'password' => bcrypt($dataRequest['password']),
        ];
        User::create($data);
        return redirect()->route('gurusenbud.index')
            ->with('success','Successed add data');
    }
    public function edit($id){        
        $senbud = Ekskul::where('type','=','Senbud')->get();
        $gurusenbud = User::find($id);
        return view('Admin.gurusenbud.update',compact('senbud','gurusenbud'));        
    }
    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'senbud_id'=>'required',
            'username'=>'required',
            'password'=>'required',                        
        ]);
        $dataRequest = $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'nomor_induk' => $dataRequest['nomor_induk'],
            'role' => "Guru Senbud",    
            'senbud_id' => $dataRequest['senbud_id'],            
            'username' => $dataRequest['username'],
            'password' => bcrypt($dataRequest['password']),
        ];
        User::find($id)->update($data);
        return redirect()->route('gurusenbud.index')
            ->with('success','Successed Update data');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('gurusenbud.index')
            ->with('success', 'Success Delete Data');
    }

}
