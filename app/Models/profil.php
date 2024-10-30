<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class profil extends Model
{
    use HasFactory;
    protected $table="profils";
    protected $fillable=['nama_sekolah', 'deskripsi', 'alamat', 'no_telp', 'email', 'youtube', 'facebook', 'ig', 'twitter','logo', 'gambargedung',  'background'];




    protected static function booted()
    {
        static::creating(function ($profil) {
            $profil->uid = Uuid::uuid4()->toString();
        });
    }

}
