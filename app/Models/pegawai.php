<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class pegawai extends Model
{
    use HasFactory;
    protected $table="pegawais";
    protected $fillable=[ 'nip', 'nuptk', 'nama', 'alamat', 'status', 'nama_pelajaran', 'id_kompetensi', 'foto'];



/**
 * Get the kompetensi that owns the Pegawai
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function kompetensi()
{
    return $this->belongsTo(Kompetensi::class, 'id_kompetensi', 'id');
}



protected static function booted()
{
    static::creating(function ($pegawai) {
        $pegawai->uid = Uuid::uuid4()->toString();
    });
}
}
