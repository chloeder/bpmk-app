<?php

namespace App\Livewire;

use App\Models\InformasiPelayanan;
use Livewire\Component;

class DetailService extends Component
{
  public $informasiId, $informasiPelayanan;
  public function mount($id)
  {
    $this->informasiId = $id;
    $this->informasiPelayanan = InformasiPelayanan::find($this->informasiId);
  }
  public function render()
  {
    return view('livewire.detail-service');
  }
}
