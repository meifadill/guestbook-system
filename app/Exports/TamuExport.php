<?php

namespace App\Exports;

use App\M_tamu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TamuExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // protected $id;

    // function __construct($id) {
    //     $this->id = $id;
    // }

    public function collection()
    {
        return M_tamu::select('nama', 'check_in', 'check_out', 'pekerjaan', 'alamat', 'no_hp')->get();
    }

    public function headings(): array
    {
        return ["NAMA", "CHECK IN", "CHECK OUT", "PEKERJAAN", "ALAMAT", "NOMOR"];
    }
}
