<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pinjam extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'status',
        'buku_id',
        'tgl_pinjam',
        'lama_pinjam',
        'tgl_balik',
        'tgl_kembali',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'buku_id' => 'integer',
        'tgl_pinjam' => 'date',
        'tgl_balik' => 'date',
        'tgl_kembali' => 'date',
    ];

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class);
    }
}
