<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Rayon;
use App\Models\Ekskul;
use App\Models\Rombel;
use Illuminate\Support\Facades\Auth;



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
        $user = Auth::user();
        
        $siswa = User::where('role','=','Siswa')
        ->join('ekskul as upd','upd.id','=','users.upd_id')
        ->join('ekskul as senbud','senbud.id','=','users.senbud_id')        
        ->join('ekskul as updprod','updprod.id','=','users.updprod_id')        
        ->join('rombel','rombel.id','=','users.rombel_id')
        ->join('rayon','rayon.id','=','users.rayon_id')
        ->select(   'users.id as id', 
                    'users.nomor_induk', 
                    'users.name',
                    'users.username',
                    'users.password', 
                    'rombel.name as rombel_name', 
                    'rayon.name as rayon_name', 
                    'upd.name as upd_name', 
                    'updprod.name as updprod_name', 
                    'senbud.name as senbud_name'
                    )
        ->get();
        // dd($siswa);
        return view('Admin.siswa.index',compact('siswa'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }
    public function create(){
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        $upd = Ekskul::where('type','=','Upd')->get();
        $updprod = Ekskul::where('type','=','Upd Prod')->get();
        $senbud= Ekskul::where('type','=','Senbud')->get();
        return view('Admin.siswa.create',compact('rayon','rombel','upd','senbud','updprod'));        
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'rombel_id'=>'required',
            'rayon_id'=>'required',            
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
            'updprod_id' => $dataRequest['updprod_id'],
            'senbud_id' => $dataRequest['senbud_id'],
            'username' => $dataRequest['username'],
            'password' => bcrypt($dataRequest['password']),
        ];
        User::create($data);
        return redirect()->route('student.index')
            ->with('success','Successed add data');
    }

    public function edit($id){
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        $upd = Ekskul::where('type','=','Upd')->get();
        $updprod = Ekskul::where('type','=','Upd Prod')->get();
        $senbud= Ekskul::where('type','=','Senbud')->get();
        $siswa = User::find($id);
        return view('admin.siswa.update',compact('siswa','rayon','rombel','upd','senbud','updprod'));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'name'=>'required',
            'rombel_id'=>'required',
            'rayon_id'=>'required',            
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
            'updprod_id' => $dataRequest['updprod_id'],
            'senbud_id' => $dataRequest['senbud_id'],
            'username' => $dataRequest['username'],
            'password' => bcrypt($dataRequest['password']),
        ];
        User::find($id)->update($data);
        return redirect()->route('student.index')
            ->with('success','successed update');
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('student.index')
            ->with('success', 'Success Delete Data');
    }

    
}

