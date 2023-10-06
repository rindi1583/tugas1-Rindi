<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory, HasUuids;

    public function kategoris(){
        return $this->belongsTo(Kategori::class,'kategori_id');
    }

    protected $fillable = ['nama_menu', 'kategori_id'];
}
