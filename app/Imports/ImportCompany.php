<?php

namespace App\Imports;

// use App\Contact;
use App\Models\CompanyDetails;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportCompany implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CompanyDetails([
            //
            'company_name'     => @$row[0],
            'user_id'    => @$row[1],
            'company_description'    => @$row[2]
            
        ]);
    }
}
