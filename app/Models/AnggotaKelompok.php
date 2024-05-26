<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnggotaKelompok extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  /**
   * Get the kelompok_kecil that owns the AnggotaKelompok
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function kelompok_kecil(): BelongsTo
  {
    return $this->belongsTo(KelompokKecil::class);
  }
}
