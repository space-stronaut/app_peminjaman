<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function alat(){
        return $this->belongsTo(Alat::class, 'alat_id', 'id');
    }
}
