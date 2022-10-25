<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contact::select("first_name", "last_name", "email", "phone")->get();
    }

    public function heading():array{
        return ["FirstName", "LastName", "Email", "Phone"];
    }
}
