<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjual;
use App\Http\Requests\Edit\PenjualRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PenjualController extends Controller
{
    public function edit($id)
    {
        $penjual = Penjual::findOrFail($id)->load(['user']);
        return view('users.admin.profile-penjual',['penjual'=>$penjual]);
    }

    public function update(PenjualRequest $request,$id)
    {
        $penjual = Penjual::findOrFail($id)->load(["user"]);
        $reqArray = empty($request->password) ? $request->except('password') : $request->all();
        DB::transaction(function() use($request,$reqArray,$penjual){
            if(!empty($request->file('foto_profil')))
            {
                $reqArray['foto_profil'] = uniqid().'.'.$request->file('foto_profil')->extension();
                if(!empty($penjual->foto_profil))
                {
                    Storage::disk('public')->delete('foto_profil/'.$penjual->foto_profil);
                }
                $request->file('foto_profil')->storeAs("foto_profil",$reqArray['foto_profil'],'public');
            }
            $penjual->update($reqArray);
            $penjual->user()->update($reqArray);
        });
        return redirect()->back()->with('success',"Profil ". $penjual->user->nama." berhasil diperbaharui !");
    }
}
