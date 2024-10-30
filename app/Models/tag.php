<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class tag extends Model
{
    use HasFactory;
    protected $table="tags";
    protected $fillable=['uid', 'nama_tag'];

    protected static function booted()
    {
        static::creating(function ($tag) {
            $tag->uid = Uuid::uuid4()->toString();
        });
    }



}
