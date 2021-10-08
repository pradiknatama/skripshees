<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat extends Model
{
    protected $table = 'riwayat';
	protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'aktuator',
    ];
}
