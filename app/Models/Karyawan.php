<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory, HasUuids;

    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_id');
    }

    protected $fillable = ['nama_karyawan', 'kategori_id'];
}
