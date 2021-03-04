<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ekskul;

class InstructureController extends Controller
{
    public function index()
    {
        $instruktur = User::where('role','=','Instruktur UPD')->get();
        return view('Admin.instruktur.index',compact('instruktur'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }
    public function create(){        
        $upd = Ekskul::where('type','=','Upd')->get();
        return view('Admin.instruktur.create',compact('upd'));        
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'upd_id'=>'required',
            'username'=>'required',
            'password'=>'required',                        
        ]);
        $dataRequest = $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'nomor_induk' => $dataRequest['nomor_induk'],
            'role' => "Instruktur UPD",    
            'upd_id' => $dataRequest['upd_id'],            
            'username' => $dataRequest['username'],
            'password' => $dataRequest['password'],
        ];
        User::create($data);
        return redirect()->route('instruktur.index')
            ->with('success','Successed add data');
    }
}
