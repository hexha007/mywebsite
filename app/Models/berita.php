<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class berita extends Model
{
    use HasFactory;
    protected $table="beritas";
    protected $fillable=['uid','readcount', 'judul', 'tanggal_post', 'id_user', 'id_kategori', 'tag', 'gambar', 'isi', 'file', 'status_publish','background'];


    protected $casts = [
        'tag' => 'array',     // Mengonversi tag menjadi array
        'file' => 'array',    // Mengonversi file menjadi array
    ];

    /**
     * Get the kategori that owns the berita
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori', 'id');
    }

    /**
     * Get the user that owns the berita
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public $incrementing = false;

    protected static function booted()
    {
        static::creating(function ($berita) {
            $berita->uid = Uuid::uuid4()->toString();
        });
    }

}
