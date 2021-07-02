<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scores;
use App\Models\User;
use App\Models\ScoreDetails;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class UKKScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = "UKK";
        $user = Auth::user();
        $score = Scores::query()
        ->join('users','users.id','=','scores.user_id')
        ->join('ekskul','ekskul.id','=','scores.ekskul_id')
        ->select(
            'users.name as username',
            'ekskul.name as ekskul_name',
            'ekskul.name as ekskul_name',
            'scores.name as scorename',                    
            'scores.created_at as created_at',
            'scores.id as id',
        )
        ->where([
            ['scores.type','=','UKK'],
            ['scores.user_id','=',$user->id],
        ])->latest()->paginate(15);
        

        return view('Admin.Scores.index',compact('score','types'))
        ->with('i',(request()->input('page',1)-1)*15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = "UKK";
        return view('Admin.Scores.create',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            
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
            'name' => $dataRequest['name'],
            'user_id' => $user->id,
            'ekskul_id' => $ekskul_id,
            'type' => "UKK",
        ];                
        $score = Scores::create($data);
        
        return redirect(route('ukk.show', $score->id))
            ->with('success', 'Success Added Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $types = "ukk";
        
        $user = Auth::user();
        $score = ScoreDetails::query()
        ->join('users','users.id','=','score_details.user_id')
        ->join('scores','scores.id','=','score_details.score_id')        
        ->join('rombel','rombel.id','=','users.rombel_id')
        ->join('rayon','rayon.id','=','users.rayon_id')
        ->select(
            'users.name as username',
            'scores.name as materi',
            'rombel.name as rombel',
            'rayon.name as rayon',
            'score_details.score as score',
            'score_details.id as id',
            'score_details.user_id as userid',
            'score_details.created_at as created_at',                        
        )
        ->where('score_details.score_id','=', $id)->latest()->paginate(15);        
        
        return view('Admin.Scores.show',compact('score','types'))
        ->with('i',(request()->input('page',1)-1)*15);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $score = ScoreDetails::find($id);                
        $type = "UKK";
        return view('Admin.Scores.ukk',compact('type','score'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $score = ScoreDetails::find($id);
        $scores = $score->score_id;
        $request->validate([
            'score'=>'required',            
        ]);
        $dataRequest = $request->all();
        $score->score = $dataRequest['score'];
        $score->note = $dataRequest['note'];
        $score->save();
        return redirect(route('ukk.show', $scores))
            ->with('success','Success Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $score = Scores::find($id);            
        $score->delete();
        return redirect()->route('ukk.index')
            ->with('success','Success Delete Data');
    }
}
