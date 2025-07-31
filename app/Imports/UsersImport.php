<?php

namespace App\Imports;
use App\Models\contact;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
        // die;
        foreach ($collection as $row)
        {
            contact::create([
                'email' => $row[0],
                'mo_number' => $row[1],
            ]);
        }
    }
}
