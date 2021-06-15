<?php

namespace App\Exports;

use App\Models\EmailBuilk;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportContacts implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EmailBuilk::all('id','email','description','category');
    }
}
