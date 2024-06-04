<?php

namespace App\Livewire;

use App\Models\InformasiPelayanan;
use Livewire\Component;

class Service extends Component
{
  public function render()
  {
    return view('livewire.service', [
      'informasiPelayanan' => InformasiPelayanan::all(),
    ]);
  }
}
