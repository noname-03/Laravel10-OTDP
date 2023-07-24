<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otdp extends Model
{
    use HasFactory;

    protected $table = 'otdp';

    protected $fillable = [
        'nama',
        'no_kepolisian',
        'no_pelapor',
        'kota',
        'umur',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'pekerjaan',
        'destinasi_tujuan',
        'destinasi_pulau',
        'provinsi',
        'nama_file',
        'foto',
        'hasil',
    ];
}
