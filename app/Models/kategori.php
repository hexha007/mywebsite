<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class kategori extends Model
{
    use HasFactory;
    protected $table="kategoris";
    protected $fillable=['nama_kategori', 'uid'];


    /**
     * Get all of the kategori for the berita
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function berita(): HasMany
    {
        return $this->hasMany(berita::class, 'id_kategori', 'id');
    }


    public $incrementing = false;

    protected static function booted()
    {
        static::creating(function ($kategori) {
            $kategori->uid = Uuid::uuid4()->toString();
        });
    }

}
