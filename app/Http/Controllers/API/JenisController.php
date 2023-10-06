<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends BaseController
{
    public function index(){
        $jenis = Jenis::with('kategoris')->get();
        return $this->sendSuccess($jenis, 'Jenis Layanan', 200);
    }

    public function store(Request $request){
        $validasi = $request->validate([
            'nama_menu' => 'required|unique:jenis',
            'kategori_id' => 'required'
        ]);

        $result = Jenis::create($validasi);

        if($result){
            return $this->sendSuccess($result, 'Jenis layanan berhasil ditambah', 201);
        }
        else{
            return $this->sendError('', 'Jenis layanan gagal ditambah', 400);
        }
    }

    public function destroy($id){
        $jenis = Jenis::where('id',$id);
        if($jenis->delete()){
            return $this->sendSuccess([], 'Jenis layanan Berhasil Dihapus', 303);
        }
        else{
                return $this->sendError('', 'Jenis Layanan Gagal Dihapus', 400);
        }
    }

    public function update(Request $request, $id){
        $validasi = $request->validate([
            'nama_menu' => 'required|unique:jenis',
            'kategori_id' => 'required'
        ]);
        $result = Jenis::where('id', $id)->update($validasi);
        $result->update($validasi);
        if($result){ 
            return $this->sendSuccess($result->first(), 'Jenis layanan berhasil diubah', 200);
        }
        else{ 
            return $this->sendError('', 'Jenis layanan gagal diubah', 400);
        }
    }
}
