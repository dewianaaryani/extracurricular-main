<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rombel;

use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $rombel = Rombel::latest()->paginate(5);
        return view('Admin.rombel.index',compact('rombel'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }
    public function create()
    {
        return view('Admin.rombel.create');
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
        Rombel::create($data);
        
        return redirect()->route('rombel.index')
            ->with('success', 'Success Added Data');

    }

    public function edit($id)
    {
        $rombel = Rombel::find($id);
        return view('Admin.rombel.update', compact('rombel'));
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
        Rombel::find($id)->update($data);
        return redirect()->route('rombel.index')
            ->with('success','Success Update Data');
    }
    public function destroy($id)
    {
        Rombel::find($id)->delete();
        return redirect()->route('rombel.index')
            ->with('success', 'Success Delete Data');
    }
}