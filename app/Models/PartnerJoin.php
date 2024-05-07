<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class PartnerJoin extends Model
{
    use HasFactory;
    protected $table = "partner_join";
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'type_join'
    ];
}