<?php
namespace App\Imports;

use App\Rider;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class RiderImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Rider::updateOrCreate(
                ['number' => $row[0]],
                ['name' => $row[1], 'value' => $row[2], 'race_class' => $row[3]]
            );
        }
    }
}