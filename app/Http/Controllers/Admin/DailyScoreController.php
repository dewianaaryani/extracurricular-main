<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scores;
use Illuminate\Support\Facades\Auth;

class DailyScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = "Harian";
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
        )
        ->where([
            ['scores.type','=','Harian'],
            ['scores.user_id','=',$user->id],
        ])->latest()->paginate(15);
        

        return view('Admin.Scores.index',compact('score','type'))
        ->with('i',(request()->input('page',1)-1)*15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
