<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;

class SingleExport implements FromCollection
{
    function __construct($id) {
        $this->id = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contact::where("id",$this->id)->select("first_name", "last_name", "email", "phone")->get();
    }

    public function heading():array{
        return ["FirstName", "LastName", "Email", "Phone"];
    }

}
