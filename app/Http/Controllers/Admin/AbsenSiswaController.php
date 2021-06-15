<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\AbsenDetail;
use app\Models\User;
use Illuminate\Support\Facades\Auth;
class AbsenSiswaController extends Controller
{
    public function index(){
        $user = Auth::user();    
        $absenUser = AbsenDetail::query()
        ->join('absen', 'absen.id', '=', 'absen_detail.absen_id')
        ->join('ekskul', 'ekskul.id', '=', 'absen.eskul_id')
        ->select(
            'absen_detail.id as id',
            'absen_detail.created_at as created_at',
            'absen.date as tgl_jadwal',
            'absen_detail.status as status',
            'ekskul.name as ekskul_name',
            'ekskul.type as type'
        )
        ->latest()->where('absen_detail.user_id','=',$user->id)->paginate(5);            
            // dd($absenUser);
            return view('Admin.AbsenSiswa.index',compact('absenUser'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function show(Request $request,$id)
    {
            $absenUser = AbsenDetail::query()
            ->join('absen', 'absen.id', '=', 'absen_detail.absen_id')     
            ->join('ekskul', 'ekskul.id', '=', 'absen.eskul_id')        
            ->select(
                'absen_detail.id as id',
                'absen_detail.absen_id as absen_id',
                'absen.date as tgl_jadwal',
                'absen_detail.user_id as user_id',            
                'absen_detail.status as status_absen',
                'absen_detail.updated_at as tgl_update',
                'absen_detail.reason as alasan',  
                'ekskul.name as ekskul_name',          
                )
                ->where( 'absen_detail.id','=',$id)->first();
                // dd($absenUser);

        return view('Admin.AbsenSiswa.show', compact('absenUser'));
    }
    public function present($id){
        $absen = AbsenDetail::find($id);
        $absen -> status = "1";
        $absen -> save();
        return redirect(route('absenSiswa.show',$id))
            ->with('success','Berhasil Absen');
    }
    public function izin($id){
        $absen = AbsenDetail::find($id);
        return view('Admin.AbsenSiswa.izin',compact('absen'));
    }
    public function postIzin(Request $request, $id){
        $absen = AbsenDetail::find($id);
        $dataRequest = $request->all();
        $absen->reason = $dataRequest['reason'];
        $absen->status = "2";
        $absen->save();
        return redirect(route('absenSiswa.show',$absen->id))
            ->with('success', 'Berhasil Izin');
    }

}
