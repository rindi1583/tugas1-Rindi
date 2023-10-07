<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KaryawanController extends BaseController
{

    public function store(Request $request){
        $validasi = $request->validate([
            'nama_karyawan' => 'required|unique:karyawans',
            'kategori_id' => 'required'
        ]);

        $result = Karyawan::create($validasi);

        if($result){
            return $this->sendSuccess($result, 'Data karyawan berhasil ditambah', 201);
        }
        else{
            return $this->sendError('', 'Data karyawan gagal ditambah', 400);
        }
    }

    public function destroy($id){
        $karyawans = Karyawan::where('id',$id);
        if($karyawans->delete()){
            return $this->sendSuccess([], 'Data Karyawan Berhasil Dihapus', 303);
        }
        else{
                return $this->sendError('', 'Data Karyawan Gagal Dihapus', 400);
        }
    }

    public function update(Request $request, $id){
        $validasi = $request->validate([
            'nama_karyawan' => 'required|unique:kariawans',
            'kategori_id' => 'required'
        ]);
        $result = Karyawan::where('id', $id);
        $result->update($validasi);
        if($result){ 
            return $this->sendSuccess($result->first(), 'Data Karyawan berhasil diubah', 200);
        }
        else{ 
            return $this->sendError('', 'Data Karyawan gagal diubah', 400);
        }
    }
}
