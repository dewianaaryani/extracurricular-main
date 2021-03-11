<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rayon;

class PJRayonController extends Controller
{
    public function index()
    {
        $pjr = User::where('role','=','Pembimbing Rayon')->get();
        return view('Admin.PJRayon.index',compact('pjr'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }
    public function create(){        
        $rayon = Rayon::all();
        return view('Admin.PJRayon.create',compact('rayon'));        
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'rayon_id'=>'required',
            'username'=>'required',
            'password'=>'required',                        
        ]);
        $dataRequest = $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'nomor_induk' => $dataRequest['nomor_induk'],
            'role' => "Pembimbing Rayon",
            'rayon_id' => $dataRequest['rayon_id'],            
            'username' => $dataRequest['username'],
            'password' => $dataRequest['password'],
        ];
        User::create($data);
        return redirect()->route('pjr.index')
            ->with('success','Successed add data');
    }

    public function edit($id){
        $rayon = Rayon::all();
        $pjr = User::find($id);
        return view('admin.PJRayon.update',compact('pjr','rayon'));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'name'=>'required',
            'rayon_id'=>'required',
            'username'=>'required',
            'password'=>'required',                           
        ]);
        $dataRequest = $request->all();
        $data=[
            'name' => $dataRequest['name'],
            'nomor_induk' => $dataRequest['nomor_induk'],
            'role' => "Pembimbing Rayon",
            'rayon_id' => $dataRequest['rayon_id'],            
            'username' => $dataRequest['username'],
            'password' => $dataRequest['password'],
        ];
        User::find($id)->update($data);
        return redirect()->route('pjr.index')
            ->with('success','successed update');
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('pjr.index')
            ->with('success', 'Success Delete Data');
    }
}
