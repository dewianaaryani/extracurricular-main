<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rayon;
use App\Models\Absen;
use App\Models\AbsenDetail;
use Illuminate\Support\Facades\Auth;

class PJRayonController extends Controller
{
    public function index()
    {
        $pjr = User::where('role','=','Pembimbing Rayon')
        ->join('rayon','rayon.id','=','users.rayon_id')        
        ->select(   'users.id as id', 
                    'users.nomor_induk', 
                    'users.name',
                    'users.username',
                    'users.password', 
                    'rayon.name as rayon_name')
        ->get();
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
            'password' => bcrypt($dataRequest['password']),
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
            'password' => bcrypt($dataRequest['password']),
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
    public function showUpdRayon()
    {
        $user = Auth::user();    
        // $student = User::where('role','=','Siswa');
        // $pjr = User::where('role','=','Pembimbing Rayon');
        $ekskul = "UPD";
        $absen = AbsenDetail::query()
            ->join('users as student', 'student.id', '=', 'absen_detail.user_id')
            ->join('absen', 'absen.id', '=', 'absen_detail.absen_id')
            ->join('users as instruktur', 'instruktur.id', '=', 'absen.user_id')
            ->join('ekskul', 'ekskul.id', '=', 'absen.eskul_id')                        
            ->join('rayon', 'rayon.id', '=', 'student.rayon_id')                        
            ->join('rombel', 'rombel.id', '=', 'student.rombel_id')                        
            ->select(
                'student.name as student_name',
                'student.nomor_induk as nis',
                'instruktur.name as instruktur_name',
                'ekskul.name as ekskul_name',
                'absen_detail.status as absen_status',
                'rombel.name as student_rombel',
                'absen.date as dates',
            )
            ->where([
                ['student.rayon_id', '=', $user->rayon_id],
                ['ekskul.type', '=', 'UPD'],
            ])->latest('absen_detail.updated_at')->paginate(15);
        return view('Admin.PJRayon.showUpd',compact('absen','ekskul'))
            ->with('i',(request()->input('page',1) -1) *5);
    }
    public function showUpdProdRayon()
    {
        $user = Auth::user();    
        // $student = User::where('role','=','Siswa');
        // $pjr = User::where('role','=','Pembimbing Rayon');
        $ekskul = "UPD PROD";
        $absen = AbsenDetail::query()
            ->join('users as student', 'student.id', '=', 'absen_detail.user_id')
            ->join('absen', 'absen.id', '=', 'absen_detail.absen_id')
            ->join('users as instruktur', 'instruktur.id', '=', 'absen.user_id')
            ->join('ekskul', 'ekskul.id', '=', 'absen.eskul_id')                        
            ->join('rayon', 'rayon.id', '=', 'student.rayon_id')                        
            ->join('rombel', 'rombel.id', '=', 'student.rombel_id')                        
            ->select(
                'student.name as student_name',
                'student.nomor_induk as nis',
                'instruktur.name as instruktur_name',
                'ekskul.name as ekskul_name',
                'absen_detail.status as absen_status',
                'rombel.name as student_rombel',
                'absen.date as dates',
            )
            ->where([
                ['student.rayon_id', '=', $user->rayon_id],
                ['ekskul.type', '=', 'UPD PROD'],
            ])->latest('absen_detail.updated_at')->paginate(15);
        return view('Admin.PJRayon.showUpd',compact('absen','ekskul'))
            ->with('i',(request()->input('page',1) -1) *5);
    }
    public function showSenbudRayon()
    {
        $user = Auth::user();    
        // $student = User::where('role','=','Siswa');
        // $pjr = User::where('role','=','Pembimbing Rayon');
        $ekskul = "Senbud";

         $absen = AbsenDetail::query()
            ->join('users as student', 'student.id', '=', 'absen_detail.user_id')
            ->join('absen', 'absen.id', '=', 'absen_detail.absen_id')
            ->join('users as instruktur', 'instruktur.id', '=', 'absen.user_id')
            ->join('ekskul', 'ekskul.id', '=', 'absen.eskul_id')                        
            ->join('rayon', 'rayon.id', '=', 'student.rayon_id')                        
            ->join('rombel', 'rombel.id', '=', 'student.rombel_id')               
            ->select(
                'student.name as student_name',
                'student.nomor_induk as nis',
                'instruktur.name as instruktur_name',
                'ekskul.name as ekskul_name',
                'absen_detail.status as absen_status',
                'rombel.name as student_rombel',
                'absen.date as dates',
            )
            ->where([
                ['student.rayon_id', '=', $user->rayon_id],
                ['ekskul.type', '=', 'Senbud'],
            ])->latest('absen_detail.created_at')->paginate(15);
            
        return view('Admin.PJRayon.showUpd',compact('absen','ekskul'))
            ->with('i',(request()->input('page',1) -1) *15);
    }
    public function pjrDashboard(){
        $user = Auth::user();    
        $countStudent = User::where([
            ['role','=','Siswa'],
            ['rayon_id','=',$user->rayon_id],
        ])->count();
        
        $absen = AbsenDetail::query()
        ->join('users as student', 'student.id', '=', 'absen_detail.user_id')
        ->join('absen', 'absen.id', '=', 'absen_detail.absen_id')
        ->join('users as instruktur', 'instruktur.id', '=', 'absen.user_id')
        ->join('ekskul', 'ekskul.id', '=', 'absen.eskul_id')                        
        ->join('rayon', 'rayon.id', '=', 'student.rayon_id')                        
        ->join('rombel', 'rombel.id', '=', 'student.rombel_id')            
        
        ->select(
            'student.name as student_name',
            'student.nomor_induk as nis',
            'instruktur.name as instruktur_name',
            'ekskul.name as ekskul_name',
            'absen_detail.status as absen_status',
            'absen.date as dates',
            'rombel.name as student_rombel',
            'ekskul.type as type_ekskul',
            'rayon.name as rayons'
        )
        ->where([
            ['student.rayon_id', '=', $user->rayon_id],
            ['absen_detail.status', '=', '0'],
        ])
        ->latest('absen_detail.created_at')->paginate(15);

        $countAbsen = AbsenDetail::query()
        ->join('users as student', 'student.id', '=', 'absen_detail.user_id')        
        ->where([            
            ['student.rayon_id', '=', $user->rayon_id],
            ['absen_detail.status', '=', '0'],
        ])->count();

        $countIzin = AbsenDetail::query()
        ->join('users as student', 'student.id', '=', 'absen_detail.user_id')        
        ->where([            
            ['student.rayon_id', '=', $user->rayon_id],
            ['absen_detail.status', '=', '2'],
        ])->count();

        $countNoApprove = AbsenDetail::query()
        ->join('users as student', 'student.id', '=', 'absen_detail.user_id')        
        ->where([            
            ['student.rayon_id', '=', $user->rayon_id],
            ['absen_detail.status', '=', '4'],
        ])->count();

        return view('Admin.PJRayon.dashboard',compact('absen','countStudent','countAbsen','countIzin','countNoApprove'))
            ->with('i',(request()->input('page',1)-1)*15);
    }
}
