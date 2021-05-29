<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\AbsenDetail;
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
                'absen.id as id', 
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
    public function show($id)
        {
            $absen =  Absen::find($id);
            $absenDet = AbsenDetail::query()
            ->join('absen', 'absen.id', '=', 'absen_detail.absen_id') 
            ->join('users', 'users.id', '=', 'absen_detail.user_id') 
            ->select(
                'absen_detail.id as id',
                'absen_detail.absen_id as absen_id',
                'absen_detail.user_id as user_id',            
                'users.name as student_name',
                'absen_detail.status as status',            
            )            
            ->where( 'absen_detail.absen_id','=',$absen->id)
            ->paginate(5);
            // dd($absenDet);
            return view('Admin.absen.show', compact('absenDet'))
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
        }else if($user->role == "Instruktur UPD Prod"){
            $ekskul_id = $user->updprod_id;
        }else{
            // $message = "kamu tidak mempunyai ekskul id";
            return false;
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
        $absen = Absen::find($id);
        // $date = $absen->date->date_format('m/d/Y');
        // dd($absen);
        return view('Admin.absen.update', compact('absen'));
    }
    public function update(Request $request,$id)
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
        Absen::find($id)->update($data);
        return redirect()->route('absen.index')
            ->with('success','Success Update Data');
    }
    public function destroy($id)
    {
        Absen::find($id)->delete();
        return redirect()->route('absen.index')
            ->with('success', 'Success Delete Data');
    }
}