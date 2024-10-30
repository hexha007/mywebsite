<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class album extends Model
{
    use HasFactory;

    protected $table="albums";
    protected $fillable=[ 'nama_album', 'tahun', 'deskripsi','cover'];

/**
 * Get all of the comments for the album
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function gallery()
{
    return $this->hasMany(gallery::class, 'id_album', 'id');
}

protected static function booted()
{
    static::creating(function ($album) {
        $album->uid = Uuid::uuid4()->toString();
    });
}

}
