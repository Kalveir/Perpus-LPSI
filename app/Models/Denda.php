<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Denda extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pinjam_id',
        'denda',
        'lama_waktu',
        'tgl_denda',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'pinjam_id' => 'integer',
        'tgl_denda' => 'date',
    ];

    public function pinjam(): BelongsTo
    {
        return $this->belongsTo(Pinjam::class);
    }
}
