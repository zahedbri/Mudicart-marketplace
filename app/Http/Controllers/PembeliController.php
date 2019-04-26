<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Edit\PembeliRequest;
use App\Pembeli;

class PembeliController extends Controller
{
    public function edit($id)
    {
        $pembeli = Pembeli::findOrFail($id)->load(['user']);
        return view('users.admin.profile-pembeli',["pembeli"=>$pembeli]);
    }

    public function update(PembeliRequest $request,$id)
    {   
        $pembeli = Pembeli::findOrFail($id)->load(['user']);
        $reqArray = empty($request->password) ? $request->except('password') : $request->all();

        DB::transaction(function () use ($request, $reqArray, $pembeli){
            if(!empty($request->file('foto_profil')))
            {
                $reqArray['foto_profil'] = uniqid().'.'.$request->file('foto_profil')->extension();
                if(!empty($pembeli->foto_profil))
                {
                    Storage::disk('public')->delete('foto_profil/'.$pembeli->foto_profil);
                }
                $request->file('foto_profil')->storeAs("foto_profil",$reqArray['foto_profil'],'public');
            }
            $pembeli->update($reqArray);
            $pembeli->user()->update($reqArray);
        });

        return redirect()->back()->with('success',"Profil ". $pembeli->user->nama." berhasil diperbaharui !");
    }

}
