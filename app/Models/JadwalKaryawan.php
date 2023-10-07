<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKaryawan extends Model
{
    use HasFactory, HasUuids;

    public function karyawan(){
        return $this->belongsTo(Karyawan::class,'karyawan_id');
    }

    protected $fillable = ['jadwal_kerja', 'karyawan_id'];
}
