<?php

namespace App\Imports;

use App\Models\Kheti;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KhetiImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        // dd($row);
        return new Kheti([
            'account_id' => $row['account_id'],
            'auth_id' => $row['auth_id'],
            'account_holder_name' => $row['account_holder_name'],
            'mulatvi' => $row['mulatvi'],
            'sarkari' => $row['sarkari'],
            'local' => $row['local'],
            'farti' => $row['farti'],
            'total' => $row['total'],
            'chhut' => $row['chhut'],
            'past_jadde' => $row['past_jadde'],


        ]);
    }
}
