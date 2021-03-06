<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ekskul;

class KoordinatorUpdController extends Controller
{
    public function index()
    {
        $koordinator = User::where('role','=','Koordinator Upd Prod')->get();
        return view('Admin.koordinatorupd.index',compact('koordinator'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }
    public function create(){                
        return view ('admin.koordinatorupd.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',            
            'username'=>'required',
            'password'=>'required',                        
        ]);
        $dataRequest = $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'nomor_induk' => $dataRequest['nomor_induk'],
            'role' => "Koordinator Upd Prod",    
            'username' => $dataRequest['username'],
            'password' => $dataRequest['password'],
        ];
        User::create($data);
        return redirect()->route('koordinatorupd.index')
            ->with('success','Successed add data');
    }
    public function edit($id){                
        $koordinator = User::find($id);
        return view('Admin.koordinatorupd.update',compact('koordinator'));        
    }
    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',            
            'username'=>'required',
            'password'=>'required',                        
        ]);
        $dataRequest = $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'nomor_induk' => $dataRequest['nomor_induk'],
            'role' => "Koordinator Senbud & UPD",                   
            'username' => $dataRequest['username'],
            'password' => $dataRequest['password'],
        ];
        User::find($id)->update($data);
        return redirect()->route('koordinatorupd.index')
            ->with('success','Successed Update data');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('koordinatorupd.index')
            ->with('success', 'Success Delete Data');
    }

}
