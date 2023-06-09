<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;  
use Illuminate\Notifications\Notifiable; 
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model //Defoniis Model
{
    protected $table="mahasiswas"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas     
    public $timestamps= false;  
    protected  $primaryKey = 'Nim';
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'Nim',
        'Nama',
        'Tanggal_Lahir',
        'Kelas',
        'Jurusan',
        'Email',
        'No_Handphone',
    ];
};
