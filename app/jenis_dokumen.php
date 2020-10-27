<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis_dokumen extends Model
{
    protected $table = 'jenis_dokumen';
    protected $fillable = ['nama_surat', 'object', 'file'];
    public $timestamps = false;
}
