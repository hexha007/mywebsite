<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class galleri extends Model
{
    use HasFactory;
    protected $table="gallerys";
    protected $fillable=['tanggal', 'nama_image', 'file', 'deskripsi', 'id_album'];


    /**
     * Get the user that owns the galleri
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album()
    {
        return $this->belongsTo(album::class, 'id_album', 'id');
    }


    protected static function booted()
    {
        static::creating(function ($galleri) {
            $galleri->uid = Uuid::uuid4()->toString();
        });
    }


}
