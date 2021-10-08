<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sensor extends Model
{
    protected $table = 'sensor';
	protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'tinggi',
        'ph',
        'kekeruhan',
        'suhu',
        'status_suhu',
        'status_kuras',
    ];
}
