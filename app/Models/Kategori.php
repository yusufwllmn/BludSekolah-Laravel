<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table        = "kategori_kantin";
    protected $primaryKey   = "id_ktkantin";
    protected $fillable     = ['id_ktkantin ','kode','harga'];

}
