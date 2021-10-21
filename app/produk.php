<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $fillable = ['namaproduk', 'deskripsi', 'gambar'];
}
