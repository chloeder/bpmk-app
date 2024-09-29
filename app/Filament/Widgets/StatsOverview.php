<?php

namespace App\Filament\Widgets;

use App\Models\AnggotaKelompok;
use App\Models\KelompokKecil;
use App\Models\UnitPelayanan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
      return [
        Stat::make('Total Kelompok', KelompokKecil::count())
          ->description('Jumlah total Kelompok Kecil')
          ->chart([1, 3, 5, 10, 100,])
          ->color('success'),
        Stat::make('Total Anggota Kelompok', AnggotaKelompok::count())
          ->description('Jumlah total Anggota Kelompok')
          ->chart([1, 3, 5, 10, 100,])
          ->color('success'),
        Stat::make('Total Unit Pelayanan', UnitPelayanan::count())
          ->description('Jumlah total Unit Pelayanan')
          ->chart([1, 3, 5, 10, 100,])
          ->color('success'),
      ];
    }
}
