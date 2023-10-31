<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    protected $table        = "aula";
    protected $primaryKey   = "id_aula";
    protected $fillable     = ['id_aula ','id_user','nama','no_telp','tgl_pesan','tgl_sewa','status'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
