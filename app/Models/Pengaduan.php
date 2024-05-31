<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */

    public const STATUS_DIPROSES = 'diproses';
    public const STATUS_MENUNGGU = 'menunggu';
    public const STATUS_SELESAI = 'selesai';

    protected $fillable = [
        'NIM',
        'nama',
        'pengaduan',
        'foto',
        'status',
        'created_at',
        'updated_at',
        
    ];
}
