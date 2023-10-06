<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory, HasUuids;

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'id');
    }

    public function jenis(){
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    protected $fillable = ['nama_pelanggan', 'harga', 'tanggal_transaksi', 'jenis_id'];
}
