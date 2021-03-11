<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ekskul;

class InstructureProdController extends Controller
{
    public function index()
    {
        $instrukturprod = User::where('role','=','Instruktur UPD Prod')->get();
        return view('Admin.instrukturprod.index',compact('instrukturprod'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }
    public function create(){        
        $updprod = Ekskul::where('type','=','Upd Prod')->get();
        return view('Admin.instrukturprod.create',compact('updprod'));        
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'updprod_id'=>'required',
            'username'=>'required',
            'password'=>'required',                        
        ]);
        $dataRequest = $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'nomor_induk' => $dataRequest['nomor_induk'],
            'role' => "Instruktur UPD Prod",    
            'updprod_id' => $dataRequest['updprod_id'],            
            'username' => $dataRequest['username'],
            'password' => $dataRequest['password'],
        ];
        User::create($data);
        return redirect()->route('instrukturprod.index')
            ->with('success','Successed add data');
    }

    public function edit($id){        
        $updprod = Ekskul::where('type','=','Upd Prod')->get();
        $instrukturprod = User::find($id);
        return view('admin.instrukturprod.update',compact('instrukturprod','updprod'));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'name'=>'required',            
            'updprod_id'=>'required',        
            'username'=>'required',
            'password'=>'required',                        
        ]);
        $dataRequest = $request->all();
        $data=[
            'name' => $dataRequest['name'],
            'nomor_induk' => $dataRequest['nomor_induk'],
            'role' => "Instruktur UPD Prod",
            'updprod_id' => $dataRequest['updprod_id'],
            'username' => $dataRequest['username'],
            'password' => $dataRequest['password'],
        ];
        User::find($id)->update($data);
        return redirect()->route('instrukturprod.index')
            ->with('success','successed update');
    }




    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('instrukturprod.index')
            ->with('success', 'Success Delete Data');
    }

}
