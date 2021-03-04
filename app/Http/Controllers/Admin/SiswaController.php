<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Rayon;
use App\Models\Ekskul;
use App\Models\Rombel;



class SiswaController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {   
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        $upd = Ekskul::where('type','=','Upd')->get();
        $senbud= Ekskul::where('type','=','Senbud')->get();
        $siswa = User::where('role','=','Siswa')->get();
        return view('Admin.siswa.index',compact('siswa'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }
    public function create(){
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        $upd = Ekskul::where('type','=','Upd')->get();
        $senbud= Ekskul::where('type','=','Senbud')->get();
        return view('Admin.siswa.create',compact('rayon','rombel','upd','senbud'));        
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'rombel_id'=>'required',
            'rayon_id'=>'required',
            'upd_id'=>'required',
            'senbud_id'=>'required',
            'username'=>'required',
            'password'=>'required',                        
        ]);
        $dataRequest = $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'nomor_induk' => $dataRequest['nomor_induk'],
            'role' => "Siswa",
            'rombel_id' => $dataRequest['rombel_id'],
            'rayon_id' => $dataRequest['rayon_id'],
            'upd_id' => $dataRequest['upd_id'],
            'senbud_id' => $dataRequest['senbud_id'],
            'username' => $dataRequest['username'],
            'password' => $dataRequest['password'],
        ];
        User::create($data);
        return redirect()->route('siswa.index')
            ->with('success','Successed add data');
    }

    public function edit($id){
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        $upd = Ekskul::where('type','=','Upd')->get();
        $senbud= Ekskul::where('type','=','Senbud')->get();
        $siswa = User::find($id);
        return view('admin.siswa.update',compact('siswa','rayon','rombel','upd','senbud'));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'name'=>'required',
            'rombel_id'=>'required',
            'rayon_id'=>'required',
            'upd_id'=>'required',
            'senbud_id'=>'required',
            'username'=>'required',
            'password'=>'required',                        
        ]);
        $dataRequest = $request->all();
        $data=[
            'name' => $dataRequest['name'],
            'nomor_induk' => $dataRequest['nomor_induk'],
            'role' => "Siswa",
            'rombel_id' => $dataRequest['rombel_id'],
            'rayon_id' => $dataRequest['rayon_id'],
            'upd_id' => $dataRequest['upd_id'],
            'senbud_id' => $dataRequest['senbud_id'],
            'username' => $dataRequest['username'],
            'password' => $dataRequest['password'],
        ];
        User::find($id)->update($data);
        return redirect()->route('siswa.index')
            ->with('success','successed update');
    }

    
}
