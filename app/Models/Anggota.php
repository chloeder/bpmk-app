<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anggota extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  /**
   * Get the jurusan that owns the Anggota
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function jurusan(): BelongsTo
  {
    return $this->belongsTo(Jurusan::class);
  }
}
