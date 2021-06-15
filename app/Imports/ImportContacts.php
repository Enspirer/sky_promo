<?php

namespace App\Imports;

// use App\Contact;
use App\Models\EmailBuilk;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportContacts implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmailBuilk([
            //
            'email'     => @$row[0],
            'description'    => @$row[1],
            'category'    => @$row[2]
            
        ]);
    }
}
