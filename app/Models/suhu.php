<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suhu extends Model
{
    protected $table = 'suhu';
	protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'suhu_min',
        'suhu_max',
    ];
}
