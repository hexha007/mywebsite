<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class kompetensi extends Model
{
    use HasFactory;
    protected $table="kompetensis";
    protected $fillable=['id',  'nama_kompetensi','singkatan', 'deskripsi', 'logo','foto','video','prestasi'];



    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_pegawai', 'id');
    }

    // public $incrementing = false;

    protected static function booted()
    {
        static::creating(function ($kompetensi) {
            $kompetensi->uid = Uuid::uuid4()->toString();
        });
    }
}
