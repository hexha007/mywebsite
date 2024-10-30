<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class divisi extends Model
{
    use HasFactory;
    protected $table="divisis";
    protected $fillable=[ 'nama_divisi', 'isi', 'img'];


    public $incrementing = false;

    protected static function booted()
    {
        static::creating(function ($divisi) {
            $divisi->uid = Uuid::uuid4()->toString();
        });
    }

}
