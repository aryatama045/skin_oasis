<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class JanjiTemu extends Model
{
    use HasFactory;
    protected $table = "janji_temu";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_dokter',
        'user_id',
        'jam',
        'hari',
        'created_at'
    ];
}