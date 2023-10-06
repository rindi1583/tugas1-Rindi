<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\Transaksi;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class TransaksiController extends BaseController
{
    public function index()
    {
        $transaksis = Transaksi::with('kategori.jenis')->get();
        return $this->sendSuccess($transaksis, 'Data Transaksi', 200);
    }

    public function store(Request $request){
        $validasi = $request->validate([
            'nama_pelanggan' => 'required|unique:transaksis',
            'harga' => 'required',
            'tanggal_transaksi' => 'required',
            'jenis_id' => 'required'
        ]);

        $result = Transaksi::create($validasi);
        if($result){ 
            return $this->sendSuccess($result, 'Transaksi berhasil ditambahkan', 201);
        }
        else{ 
            return $this->sendError('', 'Transaksi gagal ditambahkan', 400);
        }
    }

    public function destroy($id){
        $transaksis = Transaksi::where('id',$id);
        if($transaksis->delete()){
            return $this->sendSuccess([], 'Data Transaksi Berhasil Dihapus', 303);
        }
        else{
                return $this->sendError('', 'Data Transaksi Gagal Dihapus', 400);
        }
    }

    public function update(Request $request, $id){
        $validasi = $request->validate([
            'nama_pelanggan' => 'required|unique:transaksis',
            'harga' => 'required',
            'tanggal_transaksi' => 'required',
            'jenis_id' => 'required'
        ]);
        $result = Transaksi::where('id', $id);
        $result->update($validasi);
        if($result){ 
            return $this->sendSuccess($result->first(), 'Transaksi berhasil diubah', 200);
        }
        else{ 
            return $this->sendError('', 'Data Transaksi gagal diubah', 400);
        }
    }
}
