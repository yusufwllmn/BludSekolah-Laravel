<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantin extends Model
{
    use HasFactory;
    protected $table        = "kantin";
    protected $primaryKey   = "id_kantin";
    protected $fillable     = ['id_kantin ','id_user','nama','id_ktkantin','no_telp','tgl_pesan','awal_pesan','akhir_pesan','status'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_ktkantin');
    }
}
