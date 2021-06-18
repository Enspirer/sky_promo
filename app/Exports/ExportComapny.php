<?php

namespace App\Exports;

use App\Models\CompanyDetails;
use Maatwebsite\Excel\Concerns\FromCollection;


class ExportComapny implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CompanyDetails::all('id','company_name','company_description');
    }
}
