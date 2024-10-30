<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class download extends Model
{
    use HasFactory;
    protected $table="downloads";
    protected $fillable=[ 'nama_download', 'file', 'tanggal_post'];
    public $incrementing = false;

    protected static function booted()
    {
        static::creating(function ($download) {
            $download->uid = Uuid::uuid4()->toString();
        });
    }
}
