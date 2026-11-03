<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StafApotek extends Model
{
    use HasFactory;

    protected $table = 'staf_apoteks';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'alamat', 'tanggal_lahir', 'tempat_lahir', 'no_hp'];
}