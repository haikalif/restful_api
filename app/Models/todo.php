<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    protected $table = 'todos';

    public $timestamps = false;
    protected $fillable = [
        'judul',
        'deskripsi',
        'selesai',
        'tanggal_selesai',
        'prioritas',
        'kategori',
    ];
}
