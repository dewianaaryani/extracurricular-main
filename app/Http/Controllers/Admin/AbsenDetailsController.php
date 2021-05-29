<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AbsenDetail;
class AbsenDetailsController extends Controller
{
    public function approveAbsen(Request $request,$id)
    {                    
        $absenDetail = AbsenDetail::find($id);       
        $absen = $absenDetail->absen_id;
        $absenDetail->status= "3";
        $absenDetail->reason= null;
        $absenDetail->save();
        return redirect(route('absen.show',$absen))
        ->with('success','Success Approve Student');
    }
    public function approveIzin(Request $request,$id)
    {                    
        $absenDetail = AbsenDetail::find($id);       
        $absen = $absenDetail->absen_id;
        $absenDetail->status= "5";
        $absenDetail->reason= null;
        $absenDetail->save();
        return redirect(route('absen.show',$absen))
        ->with('success','Success Approve Student');
    }
    public function noApprove($id)
    {
        $absenDetail = AbsenDetail::find($id);
        return view('Admin.AbsenDet.noApprove',compact('absenDetail'));
    }
    public function postNoApprove(Request $request, $id)
    {
        $absenDetail = AbsenDetail::find($id);       
        $absen = $absenDetail->absen_id;
        $dataRequest = $request->all();
        $absenDetail->reason = $dataRequest['reason'];
        $absenDetail->status= "4";
        $absenDetail->save();
        return redirect(route('absen.show',$absen))
        ->with('success','Success Approve Student');
    }
    
}
