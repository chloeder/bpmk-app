<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KelompokKecil extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  /**
   * Get the user that owns the KelompokKecil
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
  public function unit_pelayanan(): BelongsTo
  {
    return $this->belongsTo(UnitPelayanan::class);
  }

  public function anggota_kelompok(): HasMany
  {
    return $this->hasMany(AnggotaKelompok::class);
  }
}
