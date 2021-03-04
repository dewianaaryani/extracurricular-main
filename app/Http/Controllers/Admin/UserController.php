<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rayon;
use App\Models\Rombel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function index(){
        $users = User::latest()->paginate(5);
        return view('Admin.User.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create(){
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        return view('Admin.User.create',compact('rayon','rombel'));
        

    }
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        $dataRequest = $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'role' => $dataRequest['role'],
            'rombel' => $dataRequest['rombel'],
            'rayon' => $dataRequest['rayon'],
            'upd_id' => $dataRequest['upd_id'],
            'senbud_id' => $dataRequest['senbud_id'],
            'username' => $dataRequest['username'],
            'password' => $dataRequest['password'],
        ];
        User::create($data);
        return redirect()->route('user.index')
            ->with('success', 'Berhasil Tambah Data');
    }
}

