<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends BaseController
{
    public function index(){
        $kategoris = Kategori::all();
        return $this->sendSuccess($kategoris, 'Data Kategori', 200);
    }

    public function store(Request $request){
        $validasi = $request->validate([
            'nama_kategori' => 'required|unique:kategoris'
        ]);

        $result = Kategori::create($validasi);
        if($result){ 
            return $this->sendSuccess($result, 'Kategori berhasil ditambahkan', 201);
        }
        else{ 
            return $this->sendError('', 'Kategori gagal ditambahkan', 400);
        }
    }

    public function destroy($id){
        $kategoris = Kategori::where('id',$id);
        if($kategoris->delete()){
            return $this->sendSuccess([], 'Data Kategori Berhasil Dihapus', 303);
        }
        else{
                return $this->sendError('', 'Data Kategori Gagal Dihapus', 400);
        }
    }

    public function update(Request $request, $id){
        $validasi = $request->validate([
            'nama_kategori' => 'required|unique:kategoris'
        ]);
        $result = Kategori::where('id', $id);
        $result->update($validasi);
        if($result){ 
            return $this->sendSuccess($result->first(), 'Kategori berhasil diubah', 200);
        }
        else{ 
            return $this->sendError('', 'Data Kategori gagal diubah', 400);
        }
    }
}
