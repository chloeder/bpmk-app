<?php

namespace App\Filament\Widgets;

use App\Models\Anggota;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class AnggotaChart extends ChartWidget
{
  protected static ?string $heading = 'Anggota Chart';
  protected static ?string $pollingInterval = '10s';
  protected static bool $isLazy = false;
  protected static ?string $maxHeight = '500px';
  protected static ?int $sort = 2;
  
  protected int | string | array $columnSpan = 'full';
    protected function getData(): array
    {
      $data = Trend::model(Anggota::class)
        ->between(
          start: now()->startOfYear(),
          end: now()->endOfYear(),
        )
        ->perMonth()
        ->dateColumn('created_at')
        ->count();
      
      return [
        'datasets' => [
          [
            'label' => 'Omset',
            'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
          ],
        ],
        'labels' => $data->map(function (TrendValue $value) {
          $date = Carbon::parse($value->date)->format('M');
          return $date;
        }),
      ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
