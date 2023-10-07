<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JadwalKaryawan;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class jadwalKaryawanController extends BaseController
{
    public function store(Request $request){
        $validasi = $request->validate([
            'jadwal_kerja' => 'required|unique:jadwal_karyawans',
            'karyawan_id' => 'required'
        ]);

        $result = JadwalKaryawan::create($validasi);
        if($result){
            return $this->sendSuccess($result, 'Data Jadwal berhasil ditambah', 201);
        }
        else{
            return $this->sendError('', 'Data Jadwal gagal ditambah', 400);
        }
    }

    public function destroy($id){
        $jadwal_karyawans = JadwalKaryawan::where('id',$id);
        if($jadwal_karyawans->delete()){
            return $this->sendSuccess([], 'Data Jadwal Berhasil Dihapus', 303);
        }
        else{
                return $this->sendError('', 'Data Jadwal Gagal Dihapus', 400);
        }
    }

    public function update(Request $request, $id){
        $validasi = $request->validate([
            'jadwal_karja' => 'required|unique:jadwal_kariawans',
            'karyawan_id' => 'required'
        ]);
        $result = JadwalKaryawan::where('id', $id);
        $result->update($validasi);
        if($result){ 
            return $this->sendSuccess($result->first(), 'Jadwal Karyawan berhasil diubah', 200);
        }
        else{ 
            return $this->sendError('', 'Jadwal Karyawan gagal diubah', 400);
        }
    }
}
