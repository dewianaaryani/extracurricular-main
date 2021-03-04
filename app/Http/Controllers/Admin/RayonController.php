<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rayon;

use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $rayon = Rayon::latest()->paginate(5);
        return view('Admin.rayon.index',compact('rayon'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }
    public function create()
    {
        return view('Admin.rayon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $dataRequest = $request->all();
        $data = [
            'name' => $dataRequest['name'],
        ];
        Rayon::create($data);
        
        return redirect()->route('rayon.index')
            ->with('success', 'Success Added Data');

    }

    public function edit($id)
    {
        $rayon = Rayon::find($id);
        return view('Admin.rayon.update', compact('rayon'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $dataRequest = $request->all();
        $data = [
            'name' => $dataRequest['name'],
        ];
        Rayon::find($id)->update($data);
        return redirect()->route('rayon.index')
            ->with('success','Success Update Data');
    }
    public function destroy($id)
    {
        Rayon::find($id)->delete();
        return redirect()->route('rayon.index')
            ->with('success', 'Success Delete Data');
    }
}