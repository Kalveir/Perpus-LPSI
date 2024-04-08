<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kategori_id',
        'rak_id',
        'sampul',
        'isbn',
        'judul',
        'penerbit',
        'penulis',
        'tahun',
        'isi',
        'jumlah',
        'tanggal_masuk',
        'no_induk',
        'rf_id',
        'no_barcode',
        'peroleh',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kategori_id' => 'integer',
        'rak_id' => 'integer',
    ];

    public function rak(): BelongsTo
    {
        return $this->belongsTo(Rak::class);
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}
