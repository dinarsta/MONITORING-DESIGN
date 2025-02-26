<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'designer_id',
        'status',
        'notes',
    ];

    /**
     * Relasi ke tabel users (designer)
     */
    public function designer()
    {
        return $this->belongsTo(User::class, 'designer_id');
    }
}
