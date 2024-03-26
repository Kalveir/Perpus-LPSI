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
        'id_kategori',
        'id_rak',
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
        'rak_id',
        'kategori_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_kategori' => 'integer',
        'id_rak' => 'integer',
        'rak_id' => 'integer',
        'kategori_id' => 'integer',
    ];

    public function rak(): BelongsTo
    {
        return $this->belongsTo(Rak::class);
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function idKategori(): BelongsTo
    {
        return $this->belongsTo(IdKategori::class);
    }

    public function idRak(): BelongsTo
    {
        return $this->belongsTo(IdRak::class);
    }
}
