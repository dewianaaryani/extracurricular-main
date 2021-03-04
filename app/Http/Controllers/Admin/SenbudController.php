<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekskul;

use Illuminate\Http\Request;

class SenbudController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */


    public function index()
    {
        $senbud = Ekskul::latest()->where('type','=','Senbud')->paginate(5);
        return view('Admin.senbud.index',compact('senbud'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }
    public function create()
    {
        return view('Admin.senbud.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'tempat'=>'required',
            'hari' => 'required',
            'jam' => 'required',
        ]);
        $dataRequest = $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'tempat' => $dataRequest['tempat'],
            'type' => "Senbud",
            'hari' => $dataRequest['hari'],
            'jam' => $dataRequest['jam'],    
        ];
        Ekskul::create($data);
        
        return redirect()->route('senbud.index')
            ->with('success', 'Success Added Data');

    }

    public function edit($id)
    {
        $senbud = Ekskul::find($id);
        return view('Admin.senbud.update', compact('senbud'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $dataRequest = $request->all();
        $data = [
        
            'name' => $dataRequest['name'],
            'tempat' => $dataRequest['tempat'],
            'type' => "Senbud",
            'hari' => $dataRequest['hari'],
            'jam' => $dataRequest['jam'],    
        
        ];
        Ekskul::find($id)->update($data);
        return redirect()->route('senbud.index')
            ->with('success','Success Update Data');
    }
    public function destroy($id)
    {
        Ekskul::find($id)->delete();
        return redirect()->route('senbud.index')
            ->with('success', 'Success Delete Data');
    }
}