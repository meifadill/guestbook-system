<?php

namespace App\Exports;

use App\M_tamu_inap;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TamuInapExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // protected $id;

    // function __construct($id) {
    //     $this->id = $id;
    // }

    //merupakan format fungsi dari library harus menggunakaan nama collection
    //fungsi ini akan mengembalikan data tabel tamu inap berisikan kolom kolom tersebut.
    public function collection()
    {
        return M_tamu_inap::select('nama', 'check_in', 'check_out', 'pekerjaan', 'alamat', 'no_hp')->get();
    }

    //ini merupakan fungsi untuk membuat heading pada file excel
    public function headings(): array
    {
        return ["NAMA", "CHECK IN", "CHECK OUT", "PEKERJAAN", "ALAMAT", "NOMOR"];
    }
}
