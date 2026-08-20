<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class todo extends Model
{
    protected $table = 'todos';

    use SoftDeletes;

    public $timestamps = false;
    protected $fillable = [
        'judul',
        'deskripsi',
        'selesai',
        'tanggal_selesai',
        'prioritas',
        'kategori',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
